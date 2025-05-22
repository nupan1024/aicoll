<?php

use App\Constants\CompanyStatus;

return [
    'title' => 'Companies',
    'create' => 'Create company',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'nit' => 'Nit',
    'name' => 'Name',
    'address' => 'Address',
    'phone_number' => 'Phone',
    'status' => 'Status',
    'options' => 'Options',
    'cancel' => 'Cancel',
    'success_create' => 'The company has been created successfully,',
    'success_update' => 'The company has been updated successfully.',
    'success_delete' => 'The company has been deleted successfully',
    'error_delete' => 'You cannot delete an ACTIVE company',
    'msj_delete' => 'Are you sure you want to delete the company',
    'search' => 'Search company',
    'inactive' => CompanyStatus::INACTIVE,
    'active' => CompanyStatus::ACTIVE,
];
