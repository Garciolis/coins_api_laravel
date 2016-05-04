This project is a restful API written in PHP with Laravel framework designed to manage a collection of coins with known elements (also could be to manage another type of collections like football cards).

```IMPORTANT NOTE: Elements of collection should be put when project is created using the seeds classes.```

### Capabilities
Nowadays, capabilities of this API are:
  - Obtain all collection items
  
    ```GET http://yourhost/api/coins```
  - Obtain single item

  ```GET http://yourhost/api/coins/{id}```
  - Update status of an item (set status=0 as not owned and status=1 as owned)
  
  ```PUT http://yourhost/api/coins/{id}?status={status}```  

### TO-DOs
  - Implement authorization service
  - Set account roles:
    - ***Admin*** role can set/unset a coin as owned
    - ***Helper*** role can set/unset a coin as reserved
