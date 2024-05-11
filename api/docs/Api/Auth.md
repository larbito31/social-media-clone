
## Common Headers
- **Content-Type**: `application/json`
- **Authorization**: Required for authenticated routes. Example: `Bearer {token}`

---

## Endpoints

### POST /login
Authenticates a user and issues a token.

- **URL**: `/login`
- **Method**: `POST`
- **Auth Required**: No
- **Data Constraints**:
  ```json
  {
  "email": "required|email",
  "password": "required|string"
  }
  ```
- **Data Example**:
  ```json
  {
  "email": "example@example.com",
  "password": "yourpassword"
  }
  ```

- **Success Response**:
    - **Code**: 200 OK
    - **Content**:
      ```json
      {
      "status": "ok",
      "token": "jwt_token_here"
      }
      ```

- **Error Response**:
    - **Code**: 401 Unauthorized
    - **Content**:
      ```json
      {
      "status": "error",
      "message": "Unauthorized"
      }
      ```

### POST /register
Registers a new user and issues a token.

- **URL**: `/register`
- **Method**: `POST`
- **Auth Required**: No
- **Data Constraints**:
  ```json
  {
  "name": "required|string|max:255",
  "email": "required|email|max:255|unique:users",
  "password": "required|string|min:6"
  }
  ```
- **Data Example**:
  ```json
  {
  "name": "John Doe",
  "email": "newuser@example.com",
  "password": "newpassword"
  }
  ```

- **Success Response**:
    - **Code**: 200 OK
    - **Content**:
      ```json
      {
      "status": "ok",
      "message": "User created successfully",
      "user": {
      "id": 1,
      "name": "John Doe",
      "email": "newuser@example.com"
      },
      "token": "jwt_token_here"
      }
      ```

### POST /logout
Logs out the current user by invalidating their token.

- **URL**: `/logout`
- **Method**: `POST`
- **Auth Required**: Yes
- **Success Response**:
    - **Code**: 200 OK
    - **Content**:
      ```json
      {
      "status": "ok",
      "message": "Successfully logged out"
      }
      ```

### POST /refresh
Refreshes the current token.

- **URL**: `/refresh`
- **Method**: `POST`
- **Auth Required**: Yes
- **Success Response**:
    - **Code**: 200 OK
    - **Content**:
      ```json
      {
      "status": "ok",
      "token": "new_jwt_token_here"
      }
      ```

---
