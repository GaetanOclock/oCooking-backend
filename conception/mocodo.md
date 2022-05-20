```
RECIPE: recipe_id,title,picture,abstract,content,cooking_time,cost_per_person
USER: user_id,email,password,firstname,lastname,displayname,picture
ROLE: role_key,name
COMMENT: comment_id,content
INGREDIENT: ingredient_id,name,slug
RECIPE_TYPE: recipe_type_id,name,slug

creates, 11 RECIPE,0N USER
has, 11 USER, 0N ROLE
comments, 11 COMMENT, 0N RECIPE
writes, 11 COMMENT, 0N USER
uses, 0N INGREDIENT, 1N RECIPE
defines, 0N RECIPE_TYPE, 1N RECIPE
```
