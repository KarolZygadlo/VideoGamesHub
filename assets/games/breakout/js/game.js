var game = new Phaser.Game(1280, 800, Phaser.AUTO, 'content', {preload: preload, create: create, update: update});
	var ball;
	var paddle;
	var bricks;
	var newBrick;
	var brickInfo;
	var scoreText;
	var score = 0;
	var lives = 3;
	var livesText;
	var lifeLostText;
	var playing = false;
	var startButton;
    var background;


	function preload() {
        
        game.scale.pageAlignHorizontally = true;
        game.scale.pageAlignVertically = true;
        game.load.baseURL = window.location.origin;
        game.load.image('paddle', '/assets/games/breakout/img/brick.png');
        game.load.image('brick', '/assets/games/breakout/img/brick.png');  
        game.load.image('ball', '/assets/games/breakout/img/ball.png');
        game.load.image('button', '/assets/games/breakout/img/start.png');
        game.load.image('starfield', '/assets/games/breakout/img/background.jpg');
    }

	function create() {
        background = game.add.tileSprite(0, 0, 1280, 800, 'starfield');
		game.physics.startSystem(Phaser.Physics.ARCADE);
		game.physics.arcade.checkCollision.down = false;
		ball = game.add.sprite(game.world.width*0.5, game.world.height-25, 'ball');
		ball.anchor.set(0.5);
		game.physics.enable(ball,Phaser.Physics.ARCADE);
		ball.body.collideWorldBounds = true;
		ball.body.bounce.set(1);
		ball.checkWorldBounds = true;
		ball.events.onOutOfBounds.add(ballLeaveScreen, this);

		paddle = game.add.sprite(game.world.width*0.5, game.world.height-5, 'paddle');
		paddle.anchor.set(0.5,1);
		game.physics.enable(paddle, Phaser.Physics.ARCADE);
		paddle.body.immovable = true;

		initBricks();

        textStyle = {font: '20px Arial', fill: '#ffffff'};
		scoreText = game.add.text(5, 5, 'Points: 0', textStyle);
		livesText = game.add.text(game.world.width-5, 5, 'Lives: '+lives, textStyle);
		livesText.anchor.set(1,0);
		lifeLostText = game.add.text(game.world.width*0.5, game.world.height*0.5, 'Life lost, click to continue', textStyle);
		lifeLostText.anchor.set(0.5);
		lifeLostText.visible = false;

		startButton = game.add.button(game.world.width*0.5, game.world.height*0.5, 'button', startGame, this, 1, 0, 2);
		startButton.anchor.set(0.5);

	}

	function update() {
		game.physics.arcade.collide(ball, paddle, ballHitPaddle);
		game.physics.arcade.collide(ball, bricks, ballHitBrick);
		if(playing) {
        paddle.x = game.input.x || game.world.width*0.5;
    }
  	}

	function initBricks() {
    brickInfo = {
        width: 50,
        height: 20,
        count: {
            row: 10,
            col: 21
        },
        offset: {
            top: 50,
            left: 40
        },
        padding: 10
    }
    bricks = game.add.group();
    for(c=0; c<brickInfo.count.col; c++) {
        for(r=0; r<brickInfo.count.row; r++) {
            var brickX = (c*(brickInfo.width+brickInfo.padding))+brickInfo.offset.left;
            var brickY = (r*(brickInfo.height+brickInfo.padding))+brickInfo.offset.top;
            newBrick = game.add.sprite(brickX, brickY, 'brick');
            game.physics.enable(newBrick, Phaser.Physics.ARCADE);
            newBrick.body.immovable = true;
            newBrick.anchor.set(0.5);
            bricks.add(newBrick);
        }
    }
    }

    function ballHitBrick(ball, brick) {
    var killTween = game.add.tween(brick.scale);
    killTween.to({x:0,y:0}, 200, Phaser.Easing.Linear.None);
    killTween.onComplete.addOnce(function(){
        brick.kill();
    }, this);
    killTween.start();
    score += 10;
    scoreText.setText('Points: '+score);
    if(score === brickInfo.count.row*brickInfo.count.col*10) {
        alert('You won the game, congratulations!');
        location.reload();
    }
}

    function ballHitPaddle(ball, paddle) {
    	ball.body.velocity.x = -1*5*(paddle.x-ball.x);
    }

    function ballLeaveScreen() {
    lives--;
    if(lives) {
        livesText.setText('Lives: '+lives);
        lifeLostText.visible = true;
        ball.reset(game.world.width*0.5, game.world.height-25);
        paddle.reset(game.world.width*0.5, game.world.height-5);
        game.input.onDown.addOnce(function(){
            lifeLostText.visible = false;
            ball.body.velocity.set(300, -300);
        }, this);
    }
    else {
        alert('You lost, game over! Your points: '+score);
        location.reload();
    }
}
    function startGame() {
    	startButton.destroy();
    	ball.body.velocity.set(300, -300);
    	playing = true;
    }
