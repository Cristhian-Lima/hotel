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
(NUMERO, PISO, TIPO_HABITACION, DESCRIPCION)
VALUES
    ('1', 1, 'Individual', 'Habitacion estandar para una persona.'),
    ('2', 1, 'Individual', 'Habitacion estandar para una persona.'),
    ('3', 2, 'Doble', 'Habitacion estandar para dos persona.'),
    ('4', 2, 'Doble', 'Habitacion estandar para dos persona.'),
    ('5', 3, 'Familiar', 'Habitacion con todo lo necesario para una estadia familiar'),
    ('6', 3, 'Familiar', 'Habitacion con todo lo necesario para una estadia familiar'),
    ('7', 4, 'Presidencial', 'Habitacion para satisfacer las necesidades del cliente.'),
    ('8', 4, 'Presidencial', 'Habitacion para satisfacer las necesidades del cliente.'),
    ('9', 5, 'VIP', 'Habitacion con muchos requerimientos VIP.'),
    ('10', 5, 'VIP', 'Habitacion con muchos requerimientos VIP.');

-- reservas
INSERT INTO RESERVA
    (COD_CLIENTE, FECHA_INICIO, FECHA_FINAL, FECHA_RESERVA, COD_EMP)
VALUES
    (1, '2022-09-15', '2022-09-16', '2022-09-10', 1),
    (1, '2022-10-15', '2022-09-16', '2022-09-10', 1),
    (1, '2022-05-23', '2022-05-25', '2022-09-10', 1),
    (1, '2022-09-05', '2022-09-16', '2022-09-10', 1),
    (2, '2022-10-21', '2022-10-22', '2022-09-10', 1),
    (1, '2022-09-15', '2022-09-16', '2022-09-10', 1);

