<?php

return [
    'activated'        => true, // active/inactive all logging
    'middleware'       => ['web', 'auth'],
    'route_path'       => 'admin/user-activity',
    'admin_panel_path' => 'management',
    'delete_limit'     => 7, // default 7 days

    'model' => [
        'user' => "App\Models\User",
        'categoria' => "App\Models\Alumno",
        'professor' => "App\Models\Archivo",
        'categoria' => "App\Models\Articulo",
        'categoria' => "App\Models\Blog",
        'categoria' => "App\Models\Categoria",
        'categoria' => "App\Models\Chat",
        'categoria' => "App\Models\Comentario",
        'categoria' => "App\Models\ComentarioPost",
        'categoria' => "App\Models\Empleado",
        'categoria' => "App\Models\Empresa",
        'categoria' => "App\Models\Event",
        'categoria' => "App\Models\File",
        'categoria' => "App\Models\GrupoClase",
        'categoria' => "App\Models\GrupoProfesor",
        'categoria' => "App\Models\Incidencia",
        'categoria' => "App\Models\Instituto",
        'categoria' => "App\Models\LiniaPresupuesto",
        'categoria' => "App\Models\Mensaje",
        'categoria' => "App\Models\MensajeEnviado",
        'categoria' => "App\Models\MensajeRecibido",
        'categoria' => "App\Models\Post",
        'categoria' => "App\Models\Presupuesto",
        'categoria' => "App\Models\Profesor",
        'categoria' => "App\Models\Propuesta",
        'categoria' => "App\Models\Proyecto",
        'categoria' => "App\Models\Roles",
        'categoria' => "App\Models\VersionAnterior",
        'categoria' => "App\Models\Wiki"
    ],

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
