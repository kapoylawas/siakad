<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'Filter_admin' => \App\Filters\Filter_admin::class,
		'Filter_mhs' => \App\Filters\Filter_mhs::class,
		'Filter_dsn' => \App\Filters\Filter_dsn::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'Filter_admin' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			'Filter_mhs' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			'Filter_dsn' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'Filter_admin' => ['except' => [
				'admin', 'admin/*',
				'home', 'home/*',
				'/',
				'fakultas', 'fakultas/*',
				'gedung', 'gedung/*',
				'ruangan', 'ruangan/*',
				'prodi', 'prodi/*',
				'ta', 'ta/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'dosen', 'dosen/*',
				'mahasiswa', 'mahasiswa/*',
				'kelas', 'kelas/*',
				'jadwalkuliah', 'jadwalkuliah/*',
			]],
			'Filter_mhs' => ['except' => [
				'mhs', 'mhs/*',
				'home', 'home/*',
				'krs', 'krs/*',
				'/',
			]],
			'Filter_dsn' => ['except' => [
				'dsn', 'dsn/*',
				'home', 'home/*',
				'/',
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}

