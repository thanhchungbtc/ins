<?php

namespace App\Http;

class Flash
{

	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level
		]);
	}

	public function error($title, $message)
	{
		$this->create($title, $message, 'error');
	}

	public function warning($title, $message)
	{
		$this->create($title, $message, 'warning');
	}



}