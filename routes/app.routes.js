$.routes.add('/', homeModule.goHome);

$.routes.add('/books/{id:int}/', categoriesModule.fetch);
$.routes.add('/categories/', categoriesModule.fetchAll);
