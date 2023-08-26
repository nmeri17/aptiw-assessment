## Steps to setup

1. clone repo

1. composer install && npm install

1. php artisan migrate --seed

## helpful commands
php artisan make:controller TasksController --model=Tasks --resource --requests

php artisan make:controller CategoryController --model=Category --resource --requests

php artisan make:migration create_tasks_table

php artisan make:migration create_task_category_table

php artisan serve
Laravel development server started: <http://127.0.0.1:8000>

You can use any GraphQL client with Lighthouse, make sure to point it to the URL defined in the config. By default, the endpoint lives at http://localhost:8000/graphql

php artisan inertia:start-ssr

Next, you may navigate to your application's /login or /register URLs in your web browser. All of Breeze's routes are defined within the routes/auth.php file.

## challenges

1) writing the sdl (partially done. when complete, do 2 through phpunit. when that's working, do 3)
2) crafting the front end queries
	- {
	  users {
	    data {id
	    email
	    name}
	  }
	}

	{
	  user(id: 1) {
	    email
	    name
	  }
	}

	- mutation {
	  createUser(
	    name:"John Doe"
	    email:"john.doe@example.com"
	    password: "secret"
	  ) {
	    id
	    name
	    email
	  }
	}
3) connecting it through inertia
4) adding the vue components
5) how to test