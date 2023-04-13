var config = {
    type: Phaser.AUTO,
    parent: 'content',
    width: 1280,
    height: 800,
    physics: {
        default: 'arcade'
    },
    scene: {
        preload: preload,
        create: create,
        update: update
    }
};

var game = new Phaser.Game(config);

var path;
var turrets;
var enemies;

var ENEMY_SPEED = 1/10000;
var money = 2000;
var cost = 500;

var BULLET_DAMAGE = 20;

var map = [[ 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,-1, 0, 0, 0, 0, 0, 0],
           [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1]];

function preload() {    
    this.load.baseURL = window.location.origin;
    this.load.image('turret', '/assets/games/tower_defense/img/turret.png');
    this.load.image('enemy', '/assets/games/tower_defense/img/enemy.png');
    this.load.image('bullet', '/assets/games/tower_defense/img/bullet.png');

}

var Enemy = new Phaser.Class({

        Extends: Phaser.GameObjects.Image,

        initialize:

        function Enemy (scene)
        {
            Phaser.GameObjects.Image.call(this, scene, 0, 0,'enemy');

            this.follower = { t: 0, vec: new Phaser.Math.Vector2() };
            this.hp = 0;
        },

        startOnPath: function ()
        {
            this.follower.t = 0;
            this.hp = 100;
            
            path.getPoint(this.follower.t, this.follower.vec);
            
            this.setPosition(this.follower.vec.x, this.follower.vec.y);            
        },
        receiveDamage: function(damage) {
            this.hp -= damage;           
            
            if(this.hp <= 0) {
                this.setActive(false);
                this.setVisible(false);   
                money = money + 50;   
            }
        },
        update: function (time, delta)
        {
            this.follower.t += ENEMY_SPEED * delta;
            path.getPoint(this.follower.t, this.follower.vec);
            
            this.setPosition(this.follower.vec.x, this.follower.vec.y);

            if (this.follower.t >= 1)
            {
                this.setActive(false);
                this.setVisible(false);
                alert('you lost , F5 to start again');
                this.scene.restart();

            }
        }

});

function getEnemy(x, y, distance) {
    var enemyUnits = enemies.getChildren();
    for(var i = 0; i < enemyUnits.length; i++) {       
        if(enemyUnits[i].active && Phaser.Math.Distance.Between(x, y, enemyUnits[i].x, enemyUnits[i].y) < distance)
            return enemyUnits[i];
    }
    return false;
} 

var Turret = new Phaser.Class({

        Extends: Phaser.GameObjects.Image,

        initialize:

        function Turret (scene)
        {
            Phaser.GameObjects.Image.call(this, scene, 0, 0,'turret');
            this.nextTic = 0;
        },
        place: function(i, j) {
            if (money >= cost) {
            this.y = i * 64 + 64/2;
            this.x = j * 64 + 64/2;
            map[i][j] = 1;
            money = money - cost;
            } 
            else {
            	alert("No money for that");
            }          
                      
        },
        fire: function() {
            var enemy = getEnemy(this.x, this.y, 200);
            if(enemy) {
                var angle = Phaser.Math.Angle.Between(this.x, this.y, enemy.x, enemy.y);
                addBullet(this.x, this.y, angle);
                this.angle = (angle + Math.PI/2) * Phaser.Math.RAD_TO_DEG;
            }
        },
        update: function (time, delta)
        {
            if(time > this.nextTic) {
                this.fire();
                this.nextTic = time + 1000;
            }
        }
});
    
var Bullet = new Phaser.Class({

        Extends: Phaser.GameObjects.Image,

        initialize:

        function Bullet (scene)
        {
            Phaser.GameObjects.Image.call(this, scene, 0, 0, 'bullet');

            this.incX = 0;
            this.incY = 0;
            this.lifespan = 0;

            this.speed = Phaser.Math.GetSpeed(600, 1);
        },

        fire: function (x, y, angle)
        {
            this.setActive(true);
            this.setVisible(true);
            this.setPosition(x, y);
            this.dx = Math.cos(angle);
            this.dy = Math.sin(angle);

            this.lifespan = 1000;
        },

        update: function (time, delta)
        {
            this.lifespan -= delta;

            this.x += this.dx * (this.speed * delta);
            this.y += this.dy * (this.speed * delta);

            if (this.lifespan <= 0)
            {
                this.setActive(false);
                this.setVisible(false);
            }
        }

    });
 
function create() {
    var graphics = this.add.graphics();    
    drawLines(graphics);
    path = this.add.path(290, -32);
    path.lineTo(290, 350);
    path.lineTo(865, 350);
    path.lineTo(865, 860);
    
    graphics.lineStyle(2, 0xffffff, 1);
    path.draw(graphics);

    moneygot = this.add.text(16, 16, 'money: ', { fontSize: '32px', fill: '#000' });



    enemies = this.physics.add.group({ classType: Enemy, runChildUpdate: true });
    
    turrets = this.add.group({ classType: Turret, runChildUpdate: true });
    
    bullets = this.physics.add.group({ classType: Bullet, runChildUpdate: true });
    
    this.nextEnemy = 0;
    
    this.physics.add.overlap(enemies, bullets, damageEnemy);
    
    this.input.on('pointerdown', placeTurret);

}

function damageEnemy(enemy, bullet) {  
    if (enemy.active === true && bullet.active === true) {
        bullet.setActive(false);
        bullet.setVisible(false);    
        enemy.receiveDamage(BULLET_DAMAGE);
    }
}

function drawLines(graphics) {
    graphics.lineStyle(1, 0x0000ff, 0.8);
    for(var i = 0; i < 13; i++) {
        graphics.moveTo(0, i * 64);
        graphics.lineTo(1280, i * 64);
    }
    for(var j = 0; j < 20; j++) {
        graphics.moveTo(j * 64, 0);
        graphics.lineTo(j * 64, 800);
    }
    graphics.strokePath();
}

function update(time, delta) {  

    if (time > this.nextEnemy)
    {
        var enemy = enemies.get();
        if (enemy)
        {
            enemy.setActive(true);
            enemy.setVisible(true);
            enemy.startOnPath();

            this.nextEnemy = time + 2000;
        }       
    }
}

function canPlaceTurret(i, j) {
    return map[i][j] === 0;
}

function placeTurret(pointer) {
    var i = Math.floor(pointer.y/64);
    var j = Math.floor(pointer.x/64);
    if(canPlaceTurret(i, j)) {
        var turret = turrets.get();
        if (turret)
        {
            turret.setActive(true);
            turret.setVisible(true);
            turret.place(i, j);
        }   
    }
}

function addBullet(x, y, angle) {
    var bullet = bullets.get();
    if (bullet)
    {
        bullet.fire(x, y, angle);
    }
}
