<?php

class ExampleTest extends TestCase {
// Концепция TDD - наше всё, сначала тесты, потом код
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

}
