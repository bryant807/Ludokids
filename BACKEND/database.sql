-- ============================================
-- BASE DE DATOS: LudoKids
-- ============================================
CREATE DATABASE IF NOT EXISTS ludokids CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ludokids;

-- ============================================
-- TABLA: categorias
-- Agrupa los juegos (Educativos, Recreo, etc.)
-- ============================================
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('juego', 'cuento', 'recurso') NOT NULL
);

-- ============================================
-- TABLA: juegos
-- Soporta juegos con iframe externo (Wordwall, Educaplay, Genially)
-- y juegos propios/nativos (archivo .html hecho por el equipo)
-- ============================================
CREATE TABLE juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    categoria_id INT NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    tipo_juego ENUM('iframe', 'nativo') NOT NULL,
    plataforma VARCHAR(50) NULL,          -- 'Wordwall', 'Educaplay', 'Genially' (NULL si es nativo)
    iframe_src VARCHAR(500) NULL,         -- solo si tipo_juego = 'iframe'
    iframe_width INT NULL,
    iframe_height INT NULL,
    archivo_ruta VARCHAR(255) NULL,       -- solo si tipo_juego = 'nativo'
    orden INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

-- ============================================
-- TABLA: cuentos
-- ============================================
CREATE TABLE cuentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,     -- ej: "pinocho", "caperucita"
    autor_adaptacion VARCHAR(200) NULL,    -- opcional: "Adaptación de 'Heidi' por Johanna Spyri"
    imagen_url VARCHAR(255) NOT NULL,
    imagen_alt VARCHAR(200) NULL,
    color_tarjeta VARCHAR(50) DEFAULT 'normal',
    contenido TEXT NOT NULL,
    orden INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE
);

-- ============================================
-- TABLA: recursos_profesores
-- ============================================
CREATE TABLE recursos_profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    archivo_pdf_url VARCHAR(255) NULL,
    orden INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE
);

-- ============================================
-- TABLA: equipo
-- Para la sección "Equipo desarrollador" en Nosotros
-- ============================================
CREATE TABLE equipo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    foto_url VARCHAR(255) NOT NULL,
    rol VARCHAR(100) NOT NULL,
    orden INT DEFAULT 0
);

-- ============================================
-- DATOS INICIALES: categorías
-- (necesarias antes de insertar juegos, por la FK)
-- ============================================
INSERT INTO categorias (nombre, tipo) VALUES
('Educativos', 'juego'),
('Recreo', 'juego');