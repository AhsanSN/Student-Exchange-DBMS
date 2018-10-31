
--exercise week 8 lab 


-- q1
select 
	count(*) as "number of orders"
from
	sales.Orders

-- q2
select 
	count(*) as "number of orders"
from
	sales.Orders
where
	datepart(year, OrderDate) = '2015'
	
-- q3
select 
	count(*) as "number of customers"
from
	sales.Customers cu inner join Application.Cities ci on ci.CityID = cu.PostalCityID
	inner join Application.StateProvinces sp on sp.StateProvinceID = ci.StateProvinceID 
where
	 sp.StateProvinceName = 'texas'

-- q4
select 
	count(*) as "number of items"
from
	sales.orderlines
where
	OrderID = 10

	
-- q5
select 
	datepart(year,orderdate), count(*) as "number of orders"
from
	sales.Orders
group by datepart(year,orderdate)
order by datepart(year,orderdate)

	
-- q6

select 
	COUNT(cust.CustomerName), s.StateProvinceName,c.CityName 
from
	sales.Customers cust inner join Application.Cities c on cust.PostalCityID = c.CityID
	inner join Application.StateProvinces s on c.StateProvinceID = s.StateProvinceID
Group by s.StateProvinceName,c.CityName
Order by s.StateProvinceName,c.CityName;



-- q7
select 
	c.CustomerName, count(*) as 'nOrders'
from
	sales.Customers c inner join sales.Orders o on c.CustomerID = o.CustomerID
where datepart(year,o.orderdate) = '2016'
group by c.CustomerName
having count(*)>20
order by nOrders desc

-- q8

select Sg.StockGroupID, COUNT(*) as 'nItems', min(UnitPrice) as 'min', max(UnitPrice) as 'max', avg(UnitPrice) as 'avg'
from
	Warehouse.StockGroups SG inner join Warehouse.StockItemStockGroups SI on SG.StockGroupID = Si.StockGroupID
	inner join Sales.OrderLines ol on si.StockItemID = ol.StockItemID
group by sg.StockGroupID


-- q9
select 
	o.OrderID,count(ol.OrderLineID) AS 'No.of Items', sum((ol.UnitPrice*ol.Quantity)*(1+ol.TaxRate)) as 'Order Total' 
from 
	Sales.Orders o inner join Sales.OrderLines ol on o.OrderID = ol.OrderID
group by o.OrderID
order by o.OrderID;


-- q10
select 
	fullname, count(*) as 'countn'
from
	Application.People p inner join Sales.Orders o on p.PersonID = o.SalespersonPersonID
where month(PickingCompletedWhen) = 1 and year(PickingCompletedWhen) = '2015'
group by p.FullName
having count(*) >  200

-- q11
select 
	 top 1 c.CustomerName, count(*) 
from
	Sales.Orders o inner join Sales.Customers c on o.CustomerID = c.CustomerID
group by c.CustomerName
 
-- q12

--13

select 
	top 1 sum(OL.Quantity), OL.StockItemID 
from
	Sales.Orders o inner join Sales.OrderLines OL on OL.OrderID = o.OrderID
group by OL.StockItemID;

