 <h2>Search Corporate</h2>
  <form action="#" method="get">
      <input type="hidden" name="action" value="search" />
      <label>Search by Field:</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="corp">Corporation</option>
              <option value="incorp_dt">Date</option>
              <option value="email">Email</option>
              <option value="zip">Zip Code</option>
              <option value="owner">Owner</option>
              <option value="phone">Phone Number</option>
              
          </select>
       <input type="text" name="fieldValue" />
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit">Search</button>
      <button type="submit" name="action" value="Reset">Reset</button>
      
  </form>

