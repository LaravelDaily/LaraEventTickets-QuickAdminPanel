<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'start-time' => 'Start time',			'venue' => 'Venue',		],	],
		'tickets' => [		'title' => 'Tickets',		'created_at' => 'Time',		'fields' => [			'event' => 'Event id',			'title' => 'Title',			'amount' => 'Amount',			'available-from' => 'Available from',			'available-to' => 'Available to',			'price' => 'Price',		],	],
		'payments' => [		'title' => 'Payments',		'created_at' => 'Time',		'fields' => [			'email' => 'Email',			'merchant' => 'Merchant',			'amount' => 'Amount',		],	],
	'qa_create' => 'Buat',
	'qa_save' => 'Simpan',
	'qa_edit' => 'Edit',
	'qa_view' => 'Lihat',
	'qa_update' => 'Update',
	'qa_list' => 'Daftar',
	'qa_no_entries_in_table' => 'Tidak ada data di tabel',
	'custom_controller_index' => 'Controller index yang sesuai kebutuhan Anda.',
	'qa_logout' => 'Keluar',
	'qa_add_new' => 'Tambahkan yang baru',
	'qa_are_you_sure' => 'Anda yakin?',
	'qa_back_to_list' => 'Kembali ke daftar',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Hapus',
	'quickadmin_title' => 'Event Management',
];