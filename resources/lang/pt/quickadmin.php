<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'start-time' => 'Start time',			'venue' => 'Venue',		],	],
		'tickets' => [		'title' => 'Tickets',		'created_at' => 'Time',		'fields' => [			'event' => 'Event id',			'title' => 'Title',			'amount' => 'Amount',			'available-from' => 'Available from',			'available-to' => 'Available to',			'price' => 'Price',		],	],
		'payments' => [		'title' => 'Payments',		'created_at' => 'Time',		'fields' => [			'email' => 'Email',			'merchant' => 'Merchant',			'amount' => 'Amount',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'quickadmin_title' => 'Event Management',
];