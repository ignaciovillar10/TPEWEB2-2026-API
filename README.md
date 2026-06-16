# TPEWEB2-2026-API
# ENDPOINTS SISTEMALIGA

# Los items se pueden sortear por fecha (fecha_fundacion).

# POST:
sistemaliga_tpe/api_sistemaliga/api/historia_equipo 
Respuesta: Se inserto la historia 200 ok



Ejemplo de uso:

{
    "titulo":"Historia de Santamarina 3",
    "historia":"Santamarina cambio historia",
    "fecha_fundacion":"2024-04-02",
    "id_equipo":12
}


# GET:
obtener todas las historias 
sistemaliga_tpe/api_sistemaliga/api/historia_equipo
Sin sort:

sistemaliga_tpe/api_sistemaliga/api/historia_equipo 
Respuesta: 200 ok

Con sort:

sistemaliga_tpe/api_sistemaliga/api/historia_equipo?sortBy=fecha_fundacion 

Ejemplo:

Si se desea sortear por fecha_fundacion, se listan los items de acuerdo a la fecha de fundacion
descendente


{
        "id_historia": 2,
        "titulo": "Historia de Santamarina",
        "historia": "El Club y Biblioteca Ramón Santamarina, también conocido como Club Santamarina o Ramón Santamarina de Tandil, es una institución deportiva de la ciudad de Tandil, situada en el interior de la provincia de Buenos Aires. Fue fundado el 20 de diciembre de 1913 bajo el nombre de Club Atlético Independencia. Un mes después, tras una importante donación de la familia Santamarina (integrante de la cúpula política de la ciudad), cambió su nombre por el actual. Participa en 2023 en el Torneo Federal A, tercera categoría del fútbol argentino para los equipos no afiliados a la AFA, luego del descenso de la Primera B Nacional tras permanecer 8 años en la segunda división.",
        "id_equipo": 12,
        "fecha_fundacion": "2026-05-03"
},

{
        "id_historia": 3,
        "titulo": "Historia de River",
        "historia": "Historia de RiverHistoria de RiverHistoria de RiverHistoria de RiverHistoria de River",
        "id_equipo": 12,
        "fecha_fundacion": "2026-06-10"
}








# GET BY ID:

sistemaliga_tpe/api_sistemaliga/api/historia_equipo/id: 
Respuesta: 200 ok
Ejemplo:
Get de equipo 2

{
        "id_historia": 2,
        "titulo": "Historia de Santamarina",
        "historia": "El Club y Biblioteca Ramón Santamarina, también conocido como Club Santamarina o Ramón Santamarina de Tandil, es una institución deportiva de la ciudad de Tandil, situada en el interior de la provincia de Buenos Aires. Fue fundado el 20 de diciembre de 1913 bajo el nombre de Club Atlético Independencia. Un mes después, tras una importante donación de la familia Santamarina (integrante de la cúpula política de la ciudad), cambió su nombre por el actual. Participa en 2023 en el Torneo Federal A, tercera categoría del fútbol argentino para los equipos no afiliados a la AFA, luego del descenso de la Primera B Nacional tras permanecer 8 años en la segunda división.",
        "id_equipo": 12,
        "fecha_fundacion": "2026-05-03"
},

# PUT:
sistemaliga_tpe/api_sistemaliga/api/historia_equipo/id: 
Respuesta: 200 ok
Ejemplo:
UPDATE o PUT de equipo 2

{
        "id_historia": 2,
        "titulo": "Historia de Santamarina 2",
        "historia": "Ejemplo de update del equipo Santamarina.",
        "id_equipo": 12,
        "fecha_fundacion": "2026-11-08"
},
