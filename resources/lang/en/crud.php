<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users / பணியாளர்',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'castes' => [
        'name' => 'Castes',
        'index_title' => 'Castes List / சாதிகள் பட்டியல்',
        'new_title' => 'New Caste',
        'create_title' => 'Create Caste',
        'edit_title' => 'Edit Caste',
        'show_title' => 'Show Caste',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'kootams' => [
        'name' => 'Kootams',
        'index_title' => 'Kootams List / குலம் பட்டியல்',
        'new_title' => 'New Kootam',
        'create_title' => 'Create Kootam',
        'edit_title' => 'Edit Kootam',
        'show_title' => 'Show Kootam',
        'inputs' => [
            'name' => 'Name',
            'caste_id' => 'Caste',
        ],
    ],

    'vageras' => [
        'name' => 'Vageras',
        'index_title' => 'Vagayara List / வகையாரா பட்டியல்',
        'new_title' => 'New Vagera',
        'create_title' => 'Create Vagera',
        'edit_title' => 'Edit Vagera',
        'show_title' => 'Show Vagera',
        'inputs' => [
            'name' => 'Name',
            'kootam_id' => 'Kootam',
        ],
    ],

    'temple_users' => [
        'name' => 'Temple Users',
        'index_title' => 'Temple Users / வரியாலர்கள்',
        'new_title' => 'New Temple user',
        'create_title' => 'Create TempleUser',
        'edit_title' => 'Edit TempleUser',
        'show_title' => 'Show TempleUser',
        'inputs' => [
            'name' => 'Name',
            'father_name' => 'Father Name',
            'address' => 'Address',
            'mobile_number' => 'Mobile Number',
            'kootam_id' => 'Kootam',
            'vagera_id' => 'Vagera',
            'caste_id' => 'Caste',
        ],
    ],

    'tax_lists' => [
        'name' => 'Tax Lists',
        'index_title' => 'Tax List / வரி பட்டியல்',
        'new_title' => 'New Tax list',
        'create_title' => 'Create TaxList',
        'edit_title' => 'Edit TaxList',
        'show_title' => 'Show TaxList',
        'inputs' => [
            'name' => 'Name',
            'amount' => 'Amount',
        ],
    ],

    'all_tax_payers' => [
        'name' => 'All Tax Payers',
        'index_title' => 'Pay tax / வரி செலுத்துமிடம்',
        'new_title' => 'New Tax payers',
        'create_title' => 'Create TaxPayers',
        'edit_title' => 'Edit TaxPayers',
        'show_title' => 'Show TaxPayers',
        'inputs' => [
            'temple_user_id' => 'Temple User',
            'tax_list_id' => 'Tax List',
            'paid_amount' => 'Paid Amount',
            'paid_date' => 'Paid Date',
            'paid_to' => 'Paid To',
            'receipt_no' => 'Receipt No',
        ],
    ],

    'donations' => [
        'name' => 'Donations',
        'index_title' => 'Donations Lists / நன்கொடை பட்டியல்',
        'new_title' => 'New Donation',
        'create_title' => 'Create Donation',
        'edit_title' => 'Edit Donation',
        'show_title' => 'Show Donation',
        'inputs' => [
            'tax_list_id' => 'Tax List',
            'name' => 'Name',
            'mobile_number' => 'Mobile Number',
            'father_name' => 'Father Name',
            'address' => 'Address',
            'receipt_no' => 'Receipt No',
            'last_paid_amount' => 'Last Paid Amount',
            'last_paid_to' => 'Last Paid To',
            'kootam_id' => 'Kootam',
            'vagera_id' => 'Vagera',
            'caste_id' => 'Caste',
        ],
    ],

    'expense_types' => [
        'name' => 'Expense Types',
        'index_title' => 'Expenses List / செலவுகள் பட்டியல்',
        'new_title' => 'New Expense type',
        'create_title' => 'Create ExpenseType',
        'edit_title' => 'Edit ExpenseType',
        'show_title' => 'Show ExpenseType',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'expenses' => [
        'name' => 'Expenses',
        'index_title' => 'Expenses List / செலவு வகைகளின் பட்டியல்',
        'new_title' => 'New Expense',
        'create_title' => 'Create Expense',
        'edit_title' => 'Edit Expense',
        'show_title' => 'Show Expense',
        'inputs' => [
            'tax_list_id' => 'Tax List',
            'expense_type_id' => 'Expense Type',
            'name' => 'Name',
            'expense_date' => 'Expense Date',
            'paid_to' => 'Paid To',
            'bill_no' => 'Bill No',
            'amount' => 'Amount',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
