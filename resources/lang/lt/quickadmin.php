<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'start-time' => 'Start time',			'venue' => 'Venue',		],	],
		'tickets' => [		'title' => 'Tickets',		'created_at' => 'Time',		'fields' => [			'event' => 'Event id',			'title' => 'Title',			'amount' => 'Amount',			'available-from' => 'Available from',			'available-to' => 'Available to',			'price' => 'Price',		],	],
		'payments' => [		'title' => 'Payments',		'created_at' => 'Time',		'fields' => [			'email' => 'Email',			'merchant' => 'Merchant',			'amount' => 'Amount',		],	],
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'quickadmin_title' => 'Event Management',
];