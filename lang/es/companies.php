<?php

use App\Constants\CompanyStatus;

return [
    'title' => 'Empresas',
    'create' => 'Crear empresa',
    'edit' => 'Editar',
    'delete' => 'Elminar',
    'nit' => 'Nit',
    'name' => 'Nombre',
    'address' => 'Dirección',
    'phone_number' => 'Teléfono',
    'status' => 'Estado',
    'options' => 'Opciones',
    'cancel' => 'Cancelar',
    'success_create' => 'Se ha creado la empresa exitosamente.',
    'success_update' => 'Se ha actualizado la empresa exitosamente.',
    'success_delete' => 'Se ha eliminado la empresa exitosamente.',
    'msj_delete' => '¿Estás seguro de eliminar la empresa',
    'search' => 'Buscar empresar',
    'inactive' => CompanyStatus::INACTIVE,
    'active' => CompanyStatus::ACTIVE,
];
