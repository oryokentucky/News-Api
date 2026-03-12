News API (GraphQL + Sanctum)
<p align="center">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

🚀 Project Overview
This is my first deep dive into building a modern Backend API using Laravel and GraphQL. The goal of this project was to move away from traditional REST endpoints and leverage the flexibility of a GraphQL schema to manage news content.

Key Features
GraphQL API: Full implementation of a schema to query and mutate news data.

Secure Authentication: Integrated Laravel Sanctum to handle user registration and login.

Protected Mutations: Only authenticated users can create, update, or delete news posts.

Type Safety: Defined custom GraphQL types for News, Users, and Auth payloads.

🛠 Tech Stack
Framework: Laravel 11

API Language: GraphQL

Authentication: Laravel Sanctum

GraphQL Server: (e.g., Lighthouse PHP or Rebing)

🔑 Authentication Flow
This project uses a hybrid approach to security:

Registration/Login: Handled via Sanctum to generate a Bearer Token.

Authorization: The generated token is passed in the Header of GraphQL requests.

Middleware: GraphQL mutations are wrapped in auth:sanctum middleware to ensure data integrity.

📖 How to Use
1. Installation
Bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
2. Example Mutation (Create News)
Once logged in, you can create a post by sending a mutation to the /graphql endpoint:

GraphQL
mutation {
  createNews(
    title: "My First GraphQL Post"
    content: "This is a post created via a GraphQL mutation!"
  ) {
    id
    title
    created_at
  }
}
🎓 Learning Journey
Building this project helped me understand:

How to define Schemas (Queries & Mutations).

The difference between REST and GraphQL architecture.

Securing non-traditional routes using Sanctum tokens.

License
The Laravel framework is open-sourced software licensed under the MIT license.
