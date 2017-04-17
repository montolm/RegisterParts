select *
 from user;

select name_category
 from category
where id_category = 1;

select *
 from part;

select a.id_part,a.name_part,b.name_category,a.creation_date,a.fec_actu,a.mca_inh,c.username
 from part a
inner join category b
   on a.id_category =  b.id_category
inner join user c
   on a.id_username = b.id_username
order by id_part;
 
select id_type_vehicle_motor,type_name_vehicle
 from type_vehicle_motor
order by id_type_vehicle_motor;
 
 
select type_name_vehicle
 from type_vehicle_motor
 where id_type_vehicle_motor = 1; 
 
 select *
  from vehicle_type;
 
select *
 from combustible;
 
select *
 from make;

/**Esta lleva una relacion con combustible donde cada modelo tendra un combustible*/
select *
 from vehicle_model
  where id_vehicle_make = 1
 order  by id_model;
 
select *
 from model_combustible; 
 
 select *
  from generation_model;
  
select *
from part
where id_category = 2;
 
select id_generation,concat (a.start_generation,'/',a.end_generation) as generation 
 from generation_model a
where id_model  = 1
order by id_generation;
 
select a.name_vehicle_make,b.model_name,c.start_generation,c.end_generation,e.type_combustible
 from make a
inner join vehicle_model b
  on a.id_vehicle_make =  b.id_vehicle_make
inner join generation_model c
  on  c.id_model = b.id_model
inner join model_combustible d
  on  b.id_model = d.id_model
inner join combustible e
  on  e.id_combustible = d.id_combustible
where a.id_vehicle_make = 1
  and b.id_model = 1
  and c.start_generation = 1985
  and c.end_generation = 1989
  and e.id_combustible = 1;
  
 
select a.id_model,a.model_name,c.type_combustible
  from vehicle_model a
 inner join model_combustible b
   on a.id_model = b.id_model
 inner join combustible  c
    on c.id_combustible = b.id_combustible
where a.id_model = 1;


select b.name_vehicle_make,a.model_name,c.start_generation,c.end_generation,f.type_combustible
  from vehicle_model a
 inner join make b
   on  a.id_vehicle_make = b.id_vehicle_make
 inner join generation_model c
    on c.id_model =  a.id_model
  inner join model_combustible d
	on d.id_model = a.id_model
   inner join combustible f
     on d.id_combustible = f.id_combustible;


select a.id_combustible_model,c.type_combustible,b.model_name,a.fec_actu,a.mca_inh,d.username
 from model_combustible a
inner join vehicle_model b
  on a.id_model = b.id_model
inner join combustible c
  on a.id_combustible  = c.id_combustible
inner join user d
  on a.id_username = d.id_username
order by a.id_combustible_model;


select a.id_generation,b.model_name,a.start_generation,a.end_generation,a.fec_actu,a.mca_inh,c.username
 from generation_model a
inner join vehicle_model b
  on a.id_model =  b.id_model
inner join user c
  on c.id_username = a.id_username;


 /**El Typo de vehiculo lleva 1 lista vehiculo de motor */ 
select *
 from vehicle_type;

  select a.id_vehicle_type,a.name_vehicle_type,b.type_name_vehicle,c.name_vehicle_make,d.model_name,
        concat (e.start_generation,'/',e.end_generation) generacion,a.fec_actu,a.mca_inh,f.username
  from vehicle_type a
 inner join type_vehicle_motor b
    on a.id_type_vehicle_motor = b.id_type_vehicle_motor
 inner join make c
    on a.id_vehicle_make =  c.id_vehicle_make
 inner join vehicle_model d
    on a.id_model  = d.id_model
 inner join generation_model e
    on a.id_generation = e.id_generation
 inner join user f
    on a.id_username = f.id_username
   order by a.id_vehicle_type; 
 
select a.id_model,a.model_name,b.name_vehicle_make
	from vehicle_model a
	inner join make b
	 on a.id_vehicle_make = b.id_vehicle_make
	inner join user c 
	 on a.id_username = c.id_username
	order by a.id_model;
 
 
select *
 from type_vehicle_motor;

select *
 from part
where id_category = 2;
 
select *
 from category;
 
select *
 from vehicle_type;

select *
 from part_vehicle_type;
 

select *
 from make;/* = 1*/

select *
 from vehicle_model /*=2*/; 
 
select *
 from generation_model/*=1*/;
 
 
 select *
  from vehicle_type
  where id_vehicle_make = 1
    and id_model = 1
    and id_generation = 1;
 

/*Scripts saca datos por piezas con los parametros necesarios*/
select a.id,b.name_category,c.name_vehicle_type,d.name_part
 from part_vehicle_type a
 inner join category b
   on a.id_category = b.id_category
 inner join vehicle_type c
   on a.id_vehicle_type = c.id_vehicle_type
 inner join part d
   on a.id_part = d.id_part 
where a.id_vehicle_type = 2
  and a.id_category = 2;

select *
 from part_vehicle_type
where id_category  = 2;


select *
 from make;
 
select *
 from vehicle_model;
 
 
select *
 from generation_model;
 
select *
 from combustible; 
 
select *
 from model_combustible;
 
select *
 from vehicle_type;
 

select *
 from part_vehicle_type
where id_vehicle_type = 2; 
 
select *
 from category;
 
 select *
  from part;
 
 
select a.id_vehicle_make,a.name_vehicle_make,b.model_name,c.start_generation,c.end_generation,
	   e.type_combustible,f.name_vehicle_type,h.name_category,i.name_part
 from make a
inner join vehicle_model b
   on a.id_vehicle_make = b.id_vehicle_make
inner join generation_model c
   on b.id_model  =  c.id_model
inner join model_combustible d
   on b.id_model = d.id_model
inner join combustible e
   on d.id_combustible = e.id_combustible
inner join vehicle_type f
   on b.id_model =  f.id_model
  and a.id_vehicle_make = f.id_vehicle_make
  and c.id_generation  = f.id_generation
inner join part_vehicle_type g
   on f.id_vehicle_type =  g.id_vehicle_type
inner join category h
   on g.id_category = h.id_category 
inner join part i
   on i.id_part = g.id_part
 where a.id_vehicle_make = 1
   and b.id_model  = 1
   and c.id_generation = 1
   and d.id_combustible = 1
   and f.id_vehicle_type = 1
   and h.id_category = 2
   and a.mca_inh = 'N';

 
 





    