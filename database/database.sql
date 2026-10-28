
-- =====================================================
-- University Study Plan Manager
-- Demo database for the academic project
-- =====================================================

CREATE DATABASE IF NOT EXISTS pianostudi
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE pianostudi;

-- Original table structure: users
CREATE TABLE IF NOT EXISTS utenti (
    Nome VARCHAR(100) DEFAULT NULL,
    Cognome VARCHAR(100) DEFAULT NULL,
    Matricola VARCHAR(100) DEFAULT NULL,
    Corso VARCHAR(100) DEFAULT NULL,
    Password VARCHAR(100) DEFAULT NULL,
    Crediti INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Original table structure: courses
CREATE TABLE IF NOT EXISTS corsi (
    Nome VARCHAR(100) DEFAULT NULL,
    Laurea VARCHAR(100) DEFAULT NULL,
    CID VARCHAR(100) DEFAULT NULL,
    Crediti INT DEFAULT NULL,
    Ore INT DEFAULT NULL,
    Attivo INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Demo users
-- These accounts are fictional and for local testing only.
-- Passwords are stored in plaintext to preserve the
-- authentication mechanism of the original assignment.
-- =====================================================

INSERT INTO utenti
    (Nome, Cognome, Matricola, Corso, Password, Crediti)
VALUES
    ('Demo', 'Responsabile', 'r900', NULL, 'DemoAdmin2026!', NULL),
    ('Demo', 'StudenteINF', 's901', 'INF', 'DemoStudent2026!', 20),
    ('Demo', 'StudenteGES', 's902', 'GES', 'DemoStudent2026!', 24);

-- =====================================================
-- Demo courses
-- =====================================================

INSERT INTO corsi
    (Nome, Laurea, CID, Crediti, Ore, Attivo)
VALUES
    ('Analisi Matematica I', 'INF', 'IN01', 10, 100, 1),
    ('Programmazione', 'INF', 'IN02', 8, 80, 1),
    ('Basi di Dati', 'INF', 'IN03', 8, 80, 1),
    ('Reti di Calcolatori', 'INF', 'IN04', 8, 80, 1),

    ('Economia Aziendale', 'GES', 'GE01', 8, 80, 1),
    ('Ricerca Operativa', 'GES', 'GE02', 8, 80, 1),

    ('Storia dell Architettura', 'ARC', 'AR01', 6, 60, 1),

    ('Concept Design', 'DES', 'DE01', 12, 120, 1);
