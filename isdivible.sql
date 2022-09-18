-- you will be given a table 'table' with columns 'n', 'x', and 'y'. Return the 'id' and your result in a column named 'res'.
select id, (n % x = 0 and n % y = 0) as res from table;
