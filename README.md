## About FlexibleProduct Api

FlexibleProduct is a api of ProductCart system.The functionality of this system is that it have three user admin,editor,normal user where admin can add,update and delete products , editor can only edit product.On the other hand,normal user can only view the product and add product to cart.Middleware is used for authorization purpose.Usually,ecommerce feature add-to-cart system is developed.The purpose of api is that anyone from other programming platform can add products and manage them.Registered users from api can only manage their product not admin product. 

## Features

1. Sanctum based authentication is applied where a token is provided to user.In the time of login this token is used and removed from personal_access_tokens table through logout process.
2. User can product and show,update,delete according to purpose.

## Interaction with api
Anyone who want to use this,they need to consider below endpoints and fields.
- Registration: Endpoint is localhost:8000/api/register/ (method:post).Fields are name,email,password,confirm_password
- Login: Endpoint is localhost:8000/api/login/ (method:post).Fields are email,password
- Add Product : Endpoint is localhost:8000/api/products/ (method:post).Fields are book_name,user_id,book_price,book_writer.A token and user_id is given to login response.This two are necessary for add product.
- Show Product : Endpoint is localhost:8000/api/products/id (method:get).
- Update Product : Endpoint is localhost:8000/api/products/id (method:put).Fields are book_name,user_id,book_price,book_writer.
- Delete Product : Endpoint is localhost:8000/api/products/id (method:delete).


## Api Testing
- Postman
