var config = {
   type: Phaser.AUTO,
   width: 1280,
   height: 800,
   parent: 'content',
   physics: {
   	default: 'arcade',
   	arcade: {
   		gravity: {y: 300},
   		debug: false
   	}
   },
   scene: {
   	key: 'main',
   	preload: preload,
   	create: create,
   	update: update
   }
};

var game = new Phaser.Game(config);

var platforms;
var player;
var cursors;
var stars;
var bombs;
var score = 0;
var scoreText;

function preload()
{
    this.load.baseURL = window.location.origin;
	this.load.image('background', '/assets/games/platformer/img/background.png');
    this.load.image('platform', '/assets/games/platformer/img/Grass.png');
    this.load.image('star', '/assets/games/platformer/img/star.png');
    this.load.image('bomb', '/assets/games/platformer/img/bomb.png');
    this.load.spritesheet('player',
    	'/assets/games/platformer/img/dude.png',
    	{frameWidth: 32, frameHeight: 48}
    	);
}

function create()
{
	this.add.image(0, 0, 'background').setOrigin(0,0);
    
        platforms = this.physics.add.staticGroup();
        platforms.create(50,750, 'platform');
        platforms.create(150,750, 'platform');
        platforms.create(250,750, 'platform');
        platforms.create(350,750, 'platform');
        platforms.create(450,750, 'platform');
        platforms.create(550,750, 'platform');
        platforms.create(650,750, 'platform');
        platforms.create(750,750, 'platform');
        platforms.create(850,750, 'platform');
        platforms.create(950,750, 'platform');
        platforms.create(1050,750, 'platform');
        platforms.create(1150,750, 'platform');
        platforms.create(1250,750, 'platform');
        
        platforms.create(100, 600, 'platform');
        platforms.create(400, 500, 'platform');
        platforms.create(70, 330, 'platform');
        platforms.create(450, 200, 'platform');
        platforms.create(780, 300, 'platform');
        platforms.create(1050, 150, 'platform');
        platforms.create(1150, 550, 'platform');

    player = this.physics.add.sprite(100,650, 'player');

    player.setBounce(0.2);
    player.setCollideWorldBounds(true);

    this.anims.create({
    	key: 'left',
    	frames: this.anims.generateFrameNumbers('player', { start: 0, end: 3}),
    	fremeRate: 10,
    	repeat: -1
    });

    this.anims.create({
    	key: 'turn',
    	frames: [ { key: 'player', frame: 4} ],
    	frameRate: 20
    });

    this.anims.create({
    	key: 'right',
    	frames: this.anims.generateFrameNumbers('player', { start: 5, end: 8}),
    	frameRate: 10,
    	repeat: -1
    });

    stars = this.physics.add.group({
    key: 'star',
    repeat: 17,
    setXY: { x: 12, y: 0, stepX: 70 }
});

stars.children.iterate(function (child) {

    child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));

});

    bombs = this.physics.add.group();


    scoreText = this.add.text(16, 16, 'score: 0', {fontSize: '32px', fill: '#000'});

    cursors = this.input.keyboard.createCursorKeys();

    this.physics.add.collider(player, platforms);
    this.physics.add.collider(stars, platforms);
    this.physics.add.collider(bombs, platforms);

    this.physics.add.collider(player, bombs, hitBomb, null, this);
    this.physics.add.overlap(player, stars, collectStar, null, this);
}


function update()
{
	if (cursors.left.isDown)
	{
		player.setVelocityX(-160);
		player.anims.play('left', true);
	}
	else if (cursors.right.isDown)
	{
		player.setVelocityX(160);
		player.anims.play('right', true);
	}
	else
	{
		player.setVelocityX(0);
		player.anims.play('turn');
	}
	if (cursors.up.isDown && player.body.touching.down)
    {
    player.setVelocityY(-330);
    }

}

function collectStar (player, star)
{
    star.disableBody(true, true);

        score += 10;
        scoreText.setText('Score: ' + score);

        if (stars.countActive(true) === 0)
        {
        stars.children.iterate(function (child) {

            child.enableBody(true, child.x, 0, true, true);

        });

        var x = (player.x < 800) ? Phaser.Math.Between(800, 1280) : Phaser.Math.Between(0, 800);

        var bomb = bombs.create(x, 16, 'bomb');
        bomb.setBounce(1);
        bomb.setCollideWorldBounds(true);
        bomb.setVelocity(Phaser.Math.Between(-200, 200), 20);
        bomb.allowGravity = false;

    }
}

function hitBomb (player, bomb)
{
    this.physics.pause();

    player.setTint(0xff0000);

    player.anims.play('turn');

    gameOver = true;
}
