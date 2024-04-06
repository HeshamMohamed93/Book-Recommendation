# Book Recommendation System

## Introduction
The Book Recommendation System is a platform designed to recommend books to users based on the reading intervals submitted by users. It analyzes the reading patterns of users to generate personalized book recommendations.

## Getting Started
### Installation
- Clone the repository from GitHub.
- Install dependencies using Composer.
- Configure the environment variables.
- copy the SMS provider config from env.example

```bash
# Run migrations
php artisan migrate

# Seed the database
php artisan db:seed
```

## Postman Collection

You can find the Postman collection for testing the API endpoints [here](https://www.postman.com/speeding-meadow-176611/workspace/wallet-system/collection/1053931-96a39edd-0a08-4d98-83c3-8bf8f41f0a91?action=share&creator=1053931).

### Authentication

All endpoints require authentication using Sanctum Laravel authentication. Tokens are used in all requests to authenticate users.

### Usage
1. **Submit Reading Interval:**
    - Access the reading interval submission feature.
    - Submit the interval of pages read in a specific book.

2. **Calculate Most Recommended Books:**
    - Navigate to the recommendation section.
    - View the top recommended books based on reading intervals submitted by users.

## API Documentation
The Book Recommendation System provides API endpoints for seamless integration with external applications. Below are the available endpoints:

### User Login

- **Endpoint:** `/api/login`
- **Method:** POST
- **Description:** Logs in a user to the system.
- **Request Body:**
    - `email`: User's email address.
    - `password`: User's password.
- **Response Format:** JSON
- **Authentication Required:** No

### User Registration

- **Endpoint:** `/api/register`
- **Method:** POST
- **Description:** Registers a new user in the system.
- **Request Body:**
    - `name`: User's name.
    - `email`: User's email address.
    - `password`: User's password.
    - `password_confirmation`: Confirmation of the password.
    - `phone_number`: User's phone number.
- **Response Format:** JSON
- **Authentication Required:** No


### Submit Reading Interval

- **Endpoint:** `/api/submit-interval`
- **Method:** POST
- **Description:** Submits the reading interval for a specific book.
- **Request Parameters:**
    - `book_id`: ID of the book for which the interval is being submitted.
    - `start_page`: Starting page of the interval.
    - `end_page`: Ending page of the interval.
- **Response Format:** JSON
- **Authentication Required:** Yes

### Get Most Recommended Books

- **Endpoint:** `/api/recommended-books`
- **Method:** GET
- **Description:** Retrieves the most recommended books based on reading intervals submitted by users.
- **Response Format:** JSON
- **Authentication Required:** Yes

## Troubleshooting
- If you encounter any issues with the recommendation results, ensure that the submitted reading intervals are accurate and cover a significant portion of the book.

## Support
For any questions or assistance, please contact our developer, Hesham Mohamed, at [hesham.mohamed19930@gmail.com](mailto:hesham.mohamed19930@gmail.com).
