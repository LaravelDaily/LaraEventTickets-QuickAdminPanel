<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'start-time' => 'Start time',			'venue' => 'Venue',		],	],
		'tickets' => [		'title' => 'Tickets',		'created_at' => 'Time',		'fields' => [			'event' => 'Event id',			'title' => 'Title',			'amount' => 'Amount',			'available-from' => 'Available from',			'available-to' => 'Available to',			'price' => 'Price',		],	],
		'payments' => [		'title' => 'Payments',		'created_at' => 'Time',		'fields' => [			'email' => 'Email',			'merchant' => 'Merchant',			'amount' => 'Amount',		],	],
	'qa_create' => 'Δημιουργία',
	'qa_save' => 'Αποθήκευση',
	'qa_edit' => 'Επεξεργασία',
	'qa_view' => 'Εμφάνιση',
	'qa_update' => 'Ενημέρωησ',
	'qa_list' => 'Λίστα',
	'qa_no_entries_in_table' => 'Δεν υπάρχουν δεδομένα στην ταμπέλα',
	'custom_controller_index' => 'index προσαρμοσμένου controller.',
	'qa_logout' => 'Αποσύνδεση',
	'qa_add_new' => 'Προσθήκη νέου',
	'qa_are_you_sure' => 'Είστε σίγουροι;',
	'qa_back_to_list' => 'Επιστροφή στην λίστα',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Διαγραφή',
	'quickadmin_title' => 'Event Management',
];