# BLOG-APP

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)

## Introduction

This is a simple blog application built using Laravel and Inertia.js. The application includes user authentication with email verification, CRUD functionality for blog posts, comment management, and a RESTful API for interacting with the blog posts. Tailwind CSS is used for front-end styling.

## Features

List the key features of your project:

- User Authentication:
Registration, login, and email verification.
Only verified users can create, edit, or delete blog posts and comments.

- Blog Posts:
Users can create, view, edit, and delete blog posts.
Blog posts include a title, body, and timestamps.

- Comments:
Users can comment on blog posts.
Comments are associated with a specific blog post and user.

- API:
Fetch a list of blog posts.
Fetch individual blog post details.

- Search Functionality:
Search for blog posts by title or body content.

- Fake Data Generation:
Generate 1,000 fake users using Laravel factories.

## Installation

Step-by-step instructions on how to get the project up and running.

```bash
git clone https://github.com/your-username/project-name.git
cd project-name
composer install
npm install
npm run dev
php artisan key:generate
php artisan migrate --seed
php artisan serve
php artisan app:generate-fake-users

