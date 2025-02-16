<?php
// Obtén el ID de la instalación
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Si no hay ID, redirige o muestra un error
if (!$id) {
    header('Location: ../views/error404.php');
    exit;
}

// Datos de las instalaciones (pueden venir de una base de datos)
$instalaciones = [
    // =============================================
    // Definición de la instalación: CAMPUS TURISTICO (VILLAMANIN)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'campus_turistico' => [
        'titulo' => 'Campus Turístico',
        'ubicacion' => 'Villamanin',
        'descripcion' => 'Ubicado en un entorno natural privilegiado...',
        'capacidad' => '150 personas',
        'facilidades' => 'Dormitorios, comedor, áreas recreativas...',
        'coordenadas' => [
            'lat' => 42.939735930797625,
            'lng' => -5.6547993422245035
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img1.campusTuristicoVillamanin.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img2.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img3.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img4.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img5.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img6.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img7.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img8.campusTuristicoVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_CampusTuristico/img9.campusTuristicoVillamanin.jpg',
            ]
        ]
    ],

    // =============================================
    // Definición de la instalación: ALBERGUE JUVENIL (VILLAMANIN)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'albergue_juvenil' => [
        'titulo' => 'Albergue Juvenil',
        'ubicacion' => 'Villamanin',
        'descripcion' => 'Ideal para jóvenes que buscan diversión...',
        'capacidad' => '100 personas',
        'facilidades' => 'Dormitorios, comedor...',
        'coordenadas' => [
            'lat' => 42.93749713523749, 
            'lng' => -5.655942987934993
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img1.AlbergueJuvenil.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img2.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img3.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img4.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img5.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img6.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img7.AlbergueJuvenil.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_AlbergueJuvenil\img8.AlbergueJuvenil.jpg',
            ]
        ]
    ],

    // =============================================
    // Definición de la instalación: ALBERGUE MARISTAS (VILLAMANIN)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'albergue_maristas' => [
        'titulo' => 'Albergue Juvenil',
        'ubicacion' => 'Villamanin',
        'descripcion' => 'Ideal para jóvenes que buscan diversión...',
        'capacidad' => '100 personas',
        'facilidades' => 'Dormitorios, comedor...',
        'coordenadas' => [
            'lat' => 42.93749713523749, 
            'lng' => -5.655942987934993
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img1.MaristasVillamanin.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img2.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img3.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img4.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img5.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img6.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img7.MaristasVillamanin.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Villamanin_Maristas\img8.MaristasVillamanin.jpg',
            ]
        ]
    ],


    // =============================================
    // Definición de la instalación: COLONIA SAN JOSE (VILLAMANIN)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'colonia_barro' => [
        'titulo' => 'Colonia San Jose Barro',
        'ubicacion' => 'Llanes',
        'descripcion' => 'Ideal para jóvenes que buscan diversión...',
        'capacidad' => '100 personas',
        'facilidades' => 'Dormitorios, comedor...',
        'coordenadas' => [
            'lat' => 42.93749713523749, 
            'lng' => -5.655942987934993
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img1.ColoniaSanJose.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img2.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img3.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img4.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img5.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img6.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img7.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img8.ColoniaSanJose.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Llanes_ColoniaSanJose\img9.ColoniaSanJose.jpg',

            ]
        ]
    ],
    
    // =============================================
    // Definición de la instalación: SANTIVAÑEZ (ZAMORA)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'albergue_zamora' => [
        'titulo' => 'Santibañez Zamora',
        'ubicacion' => 'Llanes',
        'descripcion' => 'Ideal para jóvenes que buscan diversión...',
        'capacidad' => '100 personas',
        'facilidades' => 'Dormitorios, comedor...',
        'coordenadas' => [
            'lat' => 42.93749713523749, 
            'lng' => -5.655942987934993
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img1.SantibañezZamora.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img2.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img3.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img4.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img5.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img6.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img7.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img8.SantibañezZamora.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img9.SantibañezZamora.jpg',
            ]
        ]
    ],
    // =============================================
    // Definición de la instalación: CAMPAMENTO JUVENIL (POLA DE GORDON)
    // Contiene los datos como título, ubicación, descripción, capacidad,
    // facilidades, coordenadas para el mapa, e imágenes asociadas.
    // =============================================
    'campamento_juvenil' => [
        'titulo' => 'Campamento juvenil pola de gordon',
        'ubicacion' => 'Llanes',
        'descripcion' => 'Ideal para jóvenes que buscan diversión...',
        'capacidad' => '100 personas',
        'facilidades' => 'Dormitorios, comedor...',
        'coordenadas' => [
            'lat' => 42.93749713523749, 
            'lng' => -5.655942987934993
        ],
        'imagenes' => [
            'principal' => '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img1.CampamentoJuvenilPolaGordon.jpg',
            'galeria' => [
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img2.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img3.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img4.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img5.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img6.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img7.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img8.CampamentoJuvenilPolaGordon.jpg',
                '\CampTrack\proyectoFinal\assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img9.CampamentoJuvenilPolaGordon.jpg',
            ]
        ]
    ]
];

// Verifica si la instalación existe
if (!array_key_exists($id, $instalaciones)) {
    header('Location: ../views/error404.php');
    exit;
}

// Carga los datos de la instalación
$instalacion = $instalaciones[$id];

// Incluye la plantilla
require_once('C:\xampp\htdocs\CampTrack\proyectoFinal\templates\instalaciones\instalacion.php');
