
<?php

class Backend_m_test extends TestCase
{

	public function setUp(): void
	{
		$this->resetInstance();
		$this->CI->load->model('Backend');
		$this->obj = $this->CI->Backend;
	}

	public function test_get_all_records()
	{
		$expected =
			[
				1 => 'Snake',
				2 => 'Breakout',
				3 => 'Platformer',
				4 => 'Tower Defense'
			];
		$list = $this->obj->get_all_records('gamezone');
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $game) {
				$this->assertEquals($expected[$game->id], $game->title);
			}
		}
	}

	public function test_get_all_active_posts()
	{
		$expected =
			[
				13 => 'Xenoblade Chronicles 2, jedna z najlepszych gier w jakie grałem w życiu. Świetny RPG z ciekawym pomysłem na system walki. Fabuła to arcydzieło. Najlepsza gra na Nintendo Switch'
			];
		$list = $this->obj->get_all_records('posts');
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->body);
			}
		}
	}

	public function test_get_all_active_user_posts()
	{
		$expected =
			[
				13 => 'Xenoblade Chronicles 2, jedna z najlepszych gier w jakie grałem w życiu. Świetny RPG z ciekawym pomysłem na system walki. Fabuła to arcydzieło. Najlepsza gra na Nintendo Switch'
			];
		$list = $this->obj->get_all_active_user_posts('posts', 4);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->body);
			}
		}
	}

	public function test_get_get_one_record()
	{
		$expected =
			[
				1 => 'Jakie imiona i nazwiska są dozwolone na VideoGamesHub?'
			];
		$record = $this->obj->get_one_record('help_center', 1);
		$this->assertEquals($expected[$record->id], $record->title);
	}


	public function test_get_newest_articles()
	{
		$expected =
			[
				21 => 'Wrażenia z pokazu Persona 5 Strikers – podobno nie tylko dla fanów',
				20 => 'Kingdoms of Amalur: Re-Reckoning trafi na Nintendo Switcha. Znamy datę premiery'
			];
		$list = $this->obj->get_newest_articles('news');
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach (array_reverse($list) as $post) {
				$this->assertEquals($expected[$post->id], $post->title);
			}
		}
	}

	public function test_insert()
	{
		$data =
			[
				'id' => '2',
				'title' => 'test',
			];
		$this->obj->insert('tests', $data);

		$expected =
			[
				2 => 'test',
			];
		$actual = $this->obj->get_one_record('tests', '2');
		$this->assertEquals($expected[$actual->id], $actual->title);
	}

	public function test_update()
	{
		$data =
			[
				'title' => 'testUpdate',
			];
		$expected =
			[
				2 => 'testUpdate'
			];
		$this->obj->update('tests', $data, '2');
		$actual = $this->obj->get_one_record('tests', '2');
		$this->assertEquals($expected[$actual->id], $actual->title);
	}

	public function test_delete()
	{
		$notexpected =
			[
				1 => 'testUpdate'
			];
		$this->obj->delete('tests', '2');
		$list = $this->obj->get_all_records('tests');
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $record) {
				$this->assertNotEquals(@$notexpected[$record->id], $record->title);
			}
		}
	}

	public function test_get_images()
    {
      $expected =
        [
          3 => '2020-12-25/1.jpg',
          4 => '2020-12-25/2.jpg',
		  5 => '2020-12-25/3.jpg',
		  6 => '2020-12-25/4.jpg',
		  7 => '2020-12-25/5.jpg',
		  8 => '2020-12-25/6.jpg',
		  9 => '2020-12-25/7.jpg'
        ];
        $list = $this->obj->get_images('gallery','reviews','1');
        if (!$list)
          {
            $this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
          } else
        {
          foreach ($list as $image)
          {
              $this->assertEquals($expected[$image->id], $image->photo);
          }
        }
	}

	public function test_get_news_comments()
	{
		$expected =
			[
				5 => 'Testowy komentarz'
			];
		$list = $this->obj->get_news_comments('news_comments', 20);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->message);
			}
		}
	}

	public function test_get_post_comments()
	{
		$expected =
			[
				4 => 'Bardzo ciekawy wpis'
			];
		$list = $this->obj->get_post_comments('post_comments', 13);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->message);
			}
		}
	}

	public function test_get_tutorials_comments()
	{
		$expected =
			[
				9 => 'Świetny poradnik bardzo mi pomógł w trakcie przechodzenia gry !!'
			];
		$list = $this->obj->get_tutorials_comments('tutorials_comments', 2);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->message);
			}
		}
	}

	public function test_get_reviews_comments()
	{
		$expected =
			[
				1 => 'test'
			];
		$list = $this->obj->get_reviews_comments('reviews_comments', 1);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->message);
			}
		}
	}

	public function test_get_user_opinion_for_tutorials()
	{
		$expected =
			[
				8 => 'Poradnik jest OK. Bardzo mi pomógł w trakcie przechodzenia gry.'
			];
		$actual = $this->obj->get_user_opinion_for_tutorials('tutorials_comments', 4 , 1);
		$this->assertEquals($expected[$actual->id], $actual->message);
	}

	public function test_get_user_data_from_table()
	{
		$expected =
			[
				1 => 'Xenoblade Chronicles 2'
			];
		$list = $this->obj->get_user_data_from_table('reviews', 4);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->title);
			}
		}
	}

	public function test_get_user_tutorials()
	{
		$expected =
			[
				2 => 'Poradnik przejścia gry Xenoblade Chronicles 2'
			];
		$list = $this->obj->get_user_tutorials('tutorials', 4);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->book_title);
			}
		}
	}

	public function test_get_chapters()
	{
		$expected =
			[
				10 => 'Rozdział 1',
				11 => 'Rozdział 2',
				12 => 'Rozdział 3',
			];
		$list = $this->obj->get_chapters('write_tutorials', 2);
		if (!$list) {
			$this->fail('!!!!!!!!!!!!!!!!!!!! Query result is empty! !!!!!!!!!!!!!!!!!!!!');
		} else {
			foreach ($list as $post) {
				$this->assertEquals($expected[$post->id], $post->chapter_title);
			}
		}
	}

	public function test_get_user_data()
	{
		$expected =
			[
				4 => 'raistlin313@gmail.com'
			];
		$actual = $this->obj->get_user_data(4);
		$this->assertEquals($expected[$actual->id], $actual->email);
	}


}
