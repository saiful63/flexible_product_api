## About FlexibleProduct Api

FlexibleProduct is a api of ProductCart system.The functionality of this system is that it have three user admin,editor,normal user where admin can add,update and delete products , editor can only edit product.On the other hand,normal user can only view the product and add product to cart.Usually,ecommerce feature add-to-cart is developed.The purpose of api is that anyone from other programming platform can add products and manage them.

## Features

1. Sanctum based authentication is applied where a token is provided to user.In the time of login this token is used and removed from personal_access_tokens table through logout process.
2. User can product and show,update,delete according to purpose.


## Endpont

1. localhost:8000/api/register/
2. localhost:8000/api/login/
3. localhost:8000/api/products/
4. localhost:8000/api/logout


## Api Testing
- Postman
