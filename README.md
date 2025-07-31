<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Gestión de Cursos y Alumnos

Aplicación web desarrollada en **Laravel** para la gestión integral de alumnos, docentes, cursos, inscripciones, evaluaciones y archivos adjuntos. El sistema implementa el patrón **MVC**, **Eloquent ORM**, validaciones del lado del servidor y buenas prácticas de desarrollo.

## ✨ Características principales

- Gestión completa de Alumnos, Docentes y Cursos.
- Inscripciones con control de asistencia, estado y nota final.
- Evaluaciones por curso y alumno.
- Carga y visualización de archivos adjuntos (materiales, tareas, guías).
- Roles diferenciados (Admin / Coordinador).
- Validaciones sólidas tanto en modelo como en formularios.
- Control de acceso por rol.

---

## 🧱 Tecnologías utilizadas

- Laravel 10+
- PHP 8+
- MySQL
- Blade (Motor de plantillas)
- Bootstrap / Tailwind CSS (según elección)
- Composer
- Git

---

## 🧩 Entidades principales y relaciones

- **Alumno**: puede inscribirse en múltiples cursos, recibir evaluaciones.
- **Docente**: imparte cursos.
- **Curso**: asignado a un docente, tiene inscripciones y archivos.
- **Inscripción**: relaciona alumnos con cursos, registra estado, nota y asistencia.
- **Evaluación**: calificación individual de un alumno en un curso.
- **Archivo Adjunto**: material relacionado a un curso.
- **Usuario del sistema**: rol `admin` o `coordinador`.

Incluye validaciones como:
- Edad mínima del alumno (16 años)
- Email y DNI únicos
- Cupo máximo de cursos por alumno/docente
- Restricciones en inscripción, aprobación, carga de notas

---

## 📌 Requisitos de instalación

1. Clonar el repositorio:

   git clone https://github.com/arandadiegoa/gestionDeCursosYAlumnos
   
2. Crear archivo .env y configurar la base de datos, que se encuentra en .env.example

3. Iniciar servidor local: php artisan serve

4. La BD se encuentra en dataBase/db/gestion_de_cursos_y_alumnos.sql

---

## 📌 Roles y datos de prueba

| Rol         | datos de prueba                                                              
| ----------- | --------------------------------------------------------------------- 
| Admin       | email: diegoAdm@gmail.com  pass: 12345678
| Coordinador | email: gabyCoordinador@gmail.com  pass: hola1234              

---

## 📌 Diagramas ER y Documentación

Se encuentran en la carpeta adjuntada

---


## ✅ CRUDs implementados

Alumnos, Docentes, Cursos

Inscripciones

Evaluaciones

Archivos

Usuarios del sistema
