INSERT INTO CLIENTE (CARNET, CORREO, PASSWORD, NOMBRES, PATERNO, MATERNO, TELEFONO, NACIONALIDAD)
VALUES
    ('9182736', 'fulanito@gmail.com', '$2y$10$vckAKC4nA3MaqVbYY5LwAeyfbv037J1JpBnnkVW1IMjRpAhvKio7G', 'Fulano', 'Perez', 'Marquez', '76543210', 'Boliviano'),
    ('1189715', 'melgarejo@gmail.com', '$2y$10$djhY0mb72UtCWsGVWKcjbeXee71eE3NZrPQUdLQOywUphOOGDHJ9S', 'Melgarejo', 'Sanchez', 'del Prado', '76152433', 'Chileno');

INSERT INTO EMPLEADOS
    (CARNET, NOMBRES, PATERNO, MATERNO, TELEFONO)
VALUES
    ('8967567', 'Jhonael', 'Romania', 'Quispe', '76544320');
-- habitaciones
INSERT INTO HABITACION
(NUMERO, PISO, TIPO_DISPONIBILIDAD, TIPO_HABITACION, DESCRIPCION)
VALUES
    ('1', 1, NULL, 'Individual', 'Habitacion estandar para una persona.'),
    ('2', 1, NULL, 'Individual', 'Habitacion estandar para una persona.'),
    ('3', 2, NULL, 'Doble', 'Habitacion estandar para dos persona.'),
    ('4', 2, NULL, 'Doble', 'Habitacion estandar para dos persona.'),
    ('5', 3, NULL, 'Familiar', 'Habitacion con todo lo necesario para una estadia familiar'),
    ('6', 3, NULL, 'Familiar', 'Habitacion con todo lo necesario para una estadia familiar'),
    ('7', 4, NULL, 'Presidencial', 'Habitacion para satisfacer las necesidades del cliente.'),
    ('8', 4, NULL, 'Presidencial', 'Habitacion para satisfacer las necesidades del cliente.'),
    ('9', 5, NULL, 'VIP', 'Habitacion con muchos requerimientos VIP.'),
    ('10', 5, NULL, 'VIP', 'Habitacion con muchos requerimientos VIP.');
