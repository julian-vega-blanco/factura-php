CREATE DATABASE facturacion;
USE facturacion;

CREATE TABLE categorias_facturas(
    factura_id INT PRIMARY KEY AUTO_INCREMENT,
    clienteId INT,
    empleadoId INT,

    FOREIGN KEY fk_cliente_id(clienteId)
    REFERENCES categorias_clientes(clientes_id),

    FOREIGN KEY fk_empleado_id(empleadoId)
    REFERENCES categorias_empleados(empleado_id),

    fecha VARCHAR (50)

);
