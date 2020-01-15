<form  action="#" method="get">
    <input type="hidden" name="action" value="sort">
       <label>Sort By Field:&nbsp;&nbsp;&nbsp;</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="corp">Corporation</option>
              <option value="incorp_dt">Date</option>
              <option value="email">Email</option>
              <option value="zipcode">Zip Code</option>
              <option value="owner">Owner</option>
              <option value="phone">Phone Number</option>
              
          </select>
       <input type="radio" name="order" value="ASC" checked />Ascending
       <input type="radio" name="order" value="DESC" />Descending
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit"  name="action">Sort</button>
      <button type="submit" name="action" value="Reset">Reset</button>
   
      
      
  </form>