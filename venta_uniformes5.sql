-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 06:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venta_uniformes5`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_producto`
--

CREATE TABLE `cat_producto` (
  `Id_Categoria` int(11) NOT NULL,
  `Des_Categoria` varchar(256) NOT NULL,
  `Eliminado` varchar(2) NOT NULL,
  `img_categoria` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_producto`
--

INSERT INTO `cat_producto` (`Id_Categoria`, `Des_Categoria`, `Eliminado`, `img_categoria`) VALUES
(1, 'cat1', 'si', 'cat1.jpg'),
(2, 'cat2', 'si', 'cat2.jpg'),
(3, 'cat nueva', 'no', 'dasdasxas.jpg'),
(4, 'ropa koreana', 'no', 'download.jpg'),
(5, 'Ropa ecuatoriana', 'no', 'cat1.jpg'),
(6, 'ropa lijera', 'no', 'Ropa-de-belleza-de-estilo-coreano-para-mujer-uniforme-de-esteticista-de-color-negro-para-Spa.webp');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `Id_Ciudad` int(3) NOT NULL,
  `Ciudad` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`Id_Ciudad`, `Ciudad`) VALUES
(1, 'Riobamba'),
(2, 'Guano');

-- --------------------------------------------------------

--
-- Table structure for table `clave_app`
--

CREATE TABLE `clave_app` (
  `password_app` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clave_app`
--

INSERT INTO `clave_app` (`password_app`) VALUES
('$2y$10$XMZQT2cUgv5XXLtJQpQRluR6fM0U0LPmjK6dwqLHE1dANyhgVagJm');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `Id_Cliente` int(11) NOT NULL,
  `Id_Persona` int(3) NOT NULL,
  `Codigo_Postal` varchar(256) NOT NULL,
  `Canal_contacto` varchar(256) NOT NULL,
  `tipo_cliente` varchar(50) NOT NULL COMMENT 'persona natural y empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`Id_Cliente`, `Id_Persona`, `Codigo_Postal`, `Canal_contacto`, `tipo_cliente`) VALUES
(1, 5, '020101', 'Instagram', 'Persona natural'),
(2, 6, '020101', 'Instagram', 'Persona natural');

-- --------------------------------------------------------

--
-- Table structure for table `color_modelo`
--

CREATE TABLE `color_modelo` (
  `Id_Color` int(3) NOT NULL,
  `Color` varchar(256) NOT NULL,
  `Eliminado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color_modelo`
--

INSERT INTO `color_modelo` (`Id_Color`, `Color`, `Eliminado`) VALUES
(1, 'rojo', 'no'),
(2, 'azul', 'no'),
(3, 'xdxd', 'si'),
(4, 'rosa', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cuenta_bancaria`
--

CREATE TABLE `cuenta_bancaria` (
  `Num_Cuenta` varchar(12) NOT NULL,
  `Banco` varchar(256) NOT NULL,
  `tipo_cuenta` varchar(50) DEFAULT 'Cuenta de ahorros' COMMENT 'Cuenta de ahorros y Cuenta corriente',
  `Eliminado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuenta_bancaria`
--

INSERT INTO `cuenta_bancaria` (`Num_Cuenta`, `Banco`, `tipo_cuenta`, `Eliminado`) VALUES
('321654', 'de lazo', 'Cuenta Corriente', 'si'),
('435345346345', 'de lazo', 'Cuenta Corriente', 'no'),
('534660000004', 'pichincha', 'Cuenta Corriente', 'no'),
('5346634520', 'fdgd', 'Cuenta de ahorros', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `Id_Cliente` int(3) NOT NULL,
  `ruc` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `Num_Factura` int(5) NOT NULL,
  `ruc` int(10) NOT NULL,
  `Eliminado` varchar(2) NOT NULL,
  `Fecha` date NOT NULL,
  `Comprobante_Pago` varchar(256) NOT NULL,
  `Descuento` decimal(5,0) NOT NULL,
  `iva` float DEFAULT NULL COMMENT 'xd',
  `SubTotal` float NOT NULL,
  `Total` float NOT NULL,
  `Pago_Bancario` int(10) DEFAULT NULL,
  `estado_factura` varchar(50) DEFAULT 'Pendiente',
  `tipo_pago` varchar(50) DEFAULT 'Efectivo',
  `Cedula` varchar(13) NOT NULL,
  `Id_Cliente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`Num_Factura`, `ruc`, `Eliminado`, `Fecha`, `Comprobante_Pago`, `Descuento`, `iva`, `SubTotal`, `Total`, `Pago_Bancario`, `estado_factura`, `tipo_pago`, `Cedula`, `Id_Cliente`) VALUES
(14, 2147483647, 'no', '2023-01-31', '', '0', 2.2, 22, 24.2, 2147483647, 'Pendiente', 'Tranferencia', '0202519914', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fact_prod`
--

CREATE TABLE `fact_prod` (
  `Id_Modelo` int(3) NOT NULL,
  `Id_Factura` int(5) NOT NULL,
  `Cantidad` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_prod`
--

INSERT INTO `fact_prod` (`Id_Modelo`, `Id_Factura`, `Cantidad`) VALUES
(2, 14, 1),
(3, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modelos`
--

CREATE TABLE `modelos` (
  `Id_Modelo` int(3) NOT NULL,
  `Des_Modelo` varchar(256) NOT NULL,
  `Img_Modelo` varchar(256) NOT NULL,
  `Stock` smallint(4) NOT NULL,
  `Precio` decimal(5,0) NOT NULL,
  `Id_Producto` int(3) NOT NULL,
  `calidad_tela` varchar(50) DEFAULT 'Nacional',
  `Id_Talla` int(3) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `Id_Color` int(3) NOT NULL,
  `Eliminado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modelos`
--

INSERT INTO `modelos` (`Id_Modelo`, `Des_Modelo`, `Img_Modelo`, `Stock`, `Precio`, `Id_Producto`, `calidad_tela`, `Id_Talla`, `tipo`, `Id_Color`, `Eliminado`) VALUES
(2, 'ropa para salir', '61ZZAFPv4LL._AC_UX569_.jpg', 12, '12', 4, 'Cloro Resistente', 1, 'Mujer', 1, 'no'),
(3, 'ropa para caminar', 'cat2.jpg', 5, '10', 3, 'Strech antifluido', 2, 'Mujer', 2, 'no'),
(4, 'camisa', 'cat1.jpg', 12, '54', 1, 'Strech antifluido', 1, 'Mujer', 1, 'no'),
(5, 'pantalon', '61ZZAFPv4LL._AC_UX569_.jpg', 12, '54', 1, 'Strech antifluido', 3, 'Mujer', 1, 'no'),
(6, 'ropa de moda', 'cat2.jpg', 12, '54', 3, 'Strech antifluido', 2, 'Mujer', 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `negocio`
--

CREATE TABLE `negocio` (
  `Ruc` varchar(13) NOT NULL,
  `Razon_Social` varchar(256) NOT NULL,
  `Nom_Comercial` varchar(256) NOT NULL,
  `Num_Establecimiento` int(5) NOT NULL,
  `Num_Facturero` int(10) NOT NULL,
  `Dir_Matriz` varchar(256) NOT NULL,
  `Autorizacion` varchar(256) NOT NULL,
  `Fecha_Autorizacion` date NOT NULL,
  `Id_Ciudad` int(3) NOT NULL,
  `Id_Telefono` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `negocio`
--

INSERT INTO `negocio` (`Ruc`, `Razon_Social`, `Nom_Comercial`, `Num_Establecimiento`, `Num_Facturero`, `Dir_Matriz`, `Autorizacion`, `Fecha_Autorizacion`, `Id_Ciudad`, `Id_Telefono`) VALUES
('0202519914001', 'Darwin B', 'Mirai', 1, 1, 'Quito', '321654987', '2022-12-06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `Id_Pedido` int(3) NOT NULL,
  `Des_Pedido` varchar(256) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `Cantidad` smallint(4) NOT NULL,
  `Fecha` date NOT NULL,
  `Eliminado` varchar(2) NOT NULL,
  `Imagen` varchar(256) NOT NULL,
  `calidad_tela` varchar(50) DEFAULT 'Nacional',
  `Id_Talla` int(3) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `Id_Color` int(3) NOT NULL,
  `estado_pedido` varchar(50) DEFAULT 'Pendiente',
  `Id_Cliente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `Id_Persona` int(3) NOT NULL,
  `Nombre` varchar(256) NOT NULL,
  `Apellido` varchar(256) NOT NULL,
  `Telefono_persona` varchar(10) NOT NULL,
  `Direccion` varchar(256) NOT NULL,
  `Correo` varchar(256) NOT NULL,
  `User_Name` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Eliminado` varchar(2) NOT NULL,
  `Id_Ciudad` int(3) NOT NULL,
  `tipo_persona` varchar(50) NOT NULL COMMENT 'personal y clientes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`Id_Persona`, `Nombre`, `Apellido`, `Telefono_persona`, `Direccion`, `Correo`, `User_Name`, `Password`, `Eliminado`, `Id_Ciudad`, `tipo_persona`) VALUES
(1, 'Darwin', 'Bayas', '0996398810', 'riobamba', 'tidomar@gmail.com', 'darwinb', '$2y$10$pj9zTq3tFkT3wQW6qtXrBubWK3640Q1gQb/j.r2cmjeKxbTwQob5K', 'no', 1, 'personal'),
(4, 'Darwin', 'Bayas', '0996398810', 'riobamba', 'tidomar@gmail.com', 'darwinbay', '$2y$10$9BEWjAHMIKTAFMSsrLHvXetpU.Kn5ZeYOk7MHbSTk62DNwyIB02vK', 'no', 1, 'personal'),
(5, 'Mi', 'Net', '0321654987', 'Quito', 'tidomar@gmail.com', 'darwinbayas', '$2y$10$jhgiyTVnfuKniBxuFawWuez1AGVz9x52CNunxBvjeOS2D59r4wuDe', 'no', 1, 'clientes'),
(6, 'dar', 'bay', '0321654987', 'fasfaf afa', 'g@gmail.com', 'g', '$2y$10$UtBzdbmBaLWiAtEWc/UJAeahETC4d585KiBoaMo3Q2EnmXisb99a6', 'no', 1, 'clientes');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `Cedula` varchar(10) NOT NULL,
  `Id_Persona` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`Cedula`, `Id_Persona`) VALUES
('0202519914', 1),
('0202519914', 4);

-- --------------------------------------------------------

--
-- Table structure for table `persona_natural`
--

CREATE TABLE `persona_natural` (
  `Cedula` varchar(10) NOT NULL,
  `Id_Cliente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persona_natural`
--

INSERT INTO `persona_natural` (`Cedula`, `Id_Cliente`) VALUES
('0202519915', 1),
('1802500964', 2);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(3) NOT NULL,
  `Des_Producto` varchar(255) NOT NULL,
  `Id_Categoria` int(3) NOT NULL,
  `Eliminado` varchar(2) NOT NULL,
  `img_Producto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Des_Producto`, `Id_Categoria`, `Eliminado`, `img_Producto`) VALUES
(1, 'camisa de verano', 1, 'no', 'Alexa.ico'),
(2, 'camisa de noche', 5, 'no', 'cat2.jpg'),
(3, 'blusa', 4, 'no', '61ZZAFPv4LL._AC_UX569_.jpg'),
(4, 'ropa de fiesta', 5, 'no', '61ZZAFPv4LL._AC_UX569_.jpg'),
(5, 'xd', 2, 'si', 'yt_icon_rgb.ico');

-- --------------------------------------------------------

--
-- Table structure for table `talla_modelo`
--

CREATE TABLE `talla_modelo` (
  `Id_Talla` int(3) NOT NULL,
  `Talla` varchar(5) NOT NULL,
  `Eliminado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talla_modelo`
--

INSERT INTO `talla_modelo` (`Id_Talla`, `Talla`, `Eliminado`) VALUES
(1, 'M', 'no'),
(2, 'L', 'no'),
(3, 'S', 'no'),
(4, 'XS', 'no'),
(5, 'XL', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE `telefono` (
  `Id_Telefono` int(3) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telefono`
--

INSERT INTO `telefono` (`Id_Telefono`, `Telefono`) VALUES
(1, '0996398810'),
(2, '0321654987');

-- --------------------------------------------------------

--
-- Table structure for table `valor_iva`
--

CREATE TABLE `valor_iva` (
  `iva` int(11) NOT NULL DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valor_iva`
--

INSERT INTO `valor_iva` (`iva`) VALUES
(10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_producto`
--
ALTER TABLE `cat_producto`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Id_Ciudad`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Persona_Cliente` (`Id_Persona`);

--
-- Indexes for table `color_modelo`
--
ALTER TABLE `color_modelo`
  ADD PRIMARY KEY (`Id_Color`);

--
-- Indexes for table `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD PRIMARY KEY (`Num_Cuenta`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Cliente`,`ruc`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Num_Factura`),
  ADD KEY `iva` (`iva`),
  ADD KEY `fact_empresa` (`ruc`),
  ADD KEY `fact_Pago` (`Pago_Bancario`),
  ADD KEY `Valida_fact` (`Cedula`),
  ADD KEY `Fact_Cliente` (`Id_Cliente`);

--
-- Indexes for table `fact_prod`
--
ALTER TABLE `fact_prod`
  ADD PRIMARY KEY (`Id_Modelo`,`Id_Factura`),
  ADD KEY `Factura_Modelo` (`Id_Factura`);

--
-- Indexes for table `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`Id_Modelo`),
  ADD KEY `Modelo_Producto` (`Id_Producto`),
  ADD KEY `Modelo_Talla` (`Id_Talla`),
  ADD KEY `Modelo_Color` (`Id_Color`);

--
-- Indexes for table `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`Ruc`),
  ADD KEY `Negocio_Ciudades` (`Id_Ciudad`),
  ADD KEY `Telefono_Negocio` (`Id_Telefono`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `Pedido_Color` (`Id_Color`),
  ADD KEY `Pedido_Talla` (`Id_Talla`),
  ADD KEY `Pedido_Clinte` (`Id_Cliente`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD KEY `Persona_Ciudad` (`Id_Ciudad`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Cedula`,`Id_Persona`),
  ADD KEY `Persona_Personal` (`Id_Persona`);

--
-- Indexes for table `persona_natural`
--
ALTER TABLE `persona_natural`
  ADD PRIMARY KEY (`Cedula`,`Id_Cliente`),
  ADD KEY `Cliente_Persona_Natural` (`Id_Cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Producto_Categoria` (`Id_Categoria`);

--
-- Indexes for table `talla_modelo`
--
ALTER TABLE `talla_modelo`
  ADD PRIMARY KEY (`Id_Talla`);

--
-- Indexes for table `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`Id_Telefono`);

--
-- Indexes for table `valor_iva`
--
ALTER TABLE `valor_iva`
  ADD PRIMARY KEY (`iva`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_producto`
--
ALTER TABLE `cat_producto`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `Id_Ciudad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color_modelo`
--
ALTER TABLE `color_modelo`
  MODIFY `Id_Color` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `Num_Factura` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `modelos`
--
ALTER TABLE `modelos`
  MODIFY `Id_Modelo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `Id_Persona` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `talla_modelo`
--
ALTER TABLE `talla_modelo`
  MODIFY `Id_Talla` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telefono`
--
ALTER TABLE `telefono`
  MODIFY `Id_Telefono` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `Persona_Cliente` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

--
-- Constraints for table `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `Cliente_Empresa` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`);

--
-- Constraints for table `fact_prod`
--
ALTER TABLE `fact_prod`
  ADD CONSTRAINT `Factura_Modelo` FOREIGN KEY (`Id_Factura`) REFERENCES `factura` (`Num_Factura`),
  ADD CONSTRAINT `Modelo_Factura2` FOREIGN KEY (`Id_Modelo`) REFERENCES `modelos` (`Id_Modelo`);

--
-- Constraints for table `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `Modelo_Color` FOREIGN KEY (`Id_Color`) REFERENCES `color_modelo` (`Id_Color`),
  ADD CONSTRAINT `Modelo_Producto` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`),
  ADD CONSTRAINT `Modelo_Talla` FOREIGN KEY (`Id_Talla`) REFERENCES `talla_modelo` (`Id_Talla`);

--
-- Constraints for table `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `Negocio_Ciudades` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudades` (`Id_Ciudad`),
  ADD CONSTRAINT `Telefono_Negocio` FOREIGN KEY (`Id_Telefono`) REFERENCES `telefono` (`Id_Telefono`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Pedido_Clinte` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`),
  ADD CONSTRAINT `Pedido_Color` FOREIGN KEY (`Id_Color`) REFERENCES `color_modelo` (`Id_Color`),
  ADD CONSTRAINT `Pedido_Talla` FOREIGN KEY (`Id_Talla`) REFERENCES `talla_modelo` (`Id_Talla`);

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `Persona_Ciudad` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudades` (`Id_Ciudad`);

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `Persona_Personal` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

--
-- Constraints for table `persona_natural`
--
ALTER TABLE `persona_natural`
  ADD CONSTRAINT `Cliente_Persona_Natural` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `Producto_Categoria` FOREIGN KEY (`Id_Categoria`) REFERENCES `cat_producto` (`Id_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
