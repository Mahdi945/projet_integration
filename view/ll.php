<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>

    <style>
@import "compass/css3";
@import url(http://fonts.googleapis.com/css?family=Roboto:100,500,300,700,400);

body{
  display: table;
  width: 100%;
  background: #dedede;
  text-align: center;
}
*{ 
  -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
  -moz-box-sizing: border-box;    /* Firefox, other Gecko */
  box-sizing: border-box;         /* Opera/IE 8+ */
}

.aa_h2{
  font:100 5rem/1 Roboto;
  text-transform: uppercase;
}
table{
   background: #fff;
}
table,thead,tbody,tfoot,tr, td,th{
  text-align: center;
  margin: auto;
  border:1px solid #dedede;
  padding: 1rem;
  width: 50%;
}
.table    { display: table; width: 50%; }
.tr       { display: table-row;  }
.thead    { display: table-header-group }
.tbody    { display: table-row-group }
.tfoot    { display: table-footer-group }
.col      { display: table-column }
.colgroup { display: table-column-group }
.td, .th   { display: table-cell; width: 50%; }
.caption  { display: table-caption }

.table,
.thead,
.tbody,
.tfoot,
.tr,
.td,
.th{
  text-align: center;
  margin: auto;
  padding: 1rem;
}
.table{
  background: #fff;
  margin: auto;
  border:none;
  padding: 0;
  margin-bottom: 5rem;
}

.th{
  font-weight: 700;
  border:1px solid #dedede;
  &:nth-child(odd){
    border-right:none;
  }
}
.td{
  font-weight: 300;
  border:1px solid #dedede;
  border-top:none;
  &:nth-child(odd){
    border-right:none;
  }
}

.aa_htmlTable{
  background: tomato;
  padding: 5rem;
  display: table;
  width: 100%;
  height: 100vh;
  vertical-align: middle;
}
.aa_css{
  background: skyblue;
  padding: 5rem;
  display: table;
  width: 100%;
  height: 100vh;
  vertical-align: middle;
}

.aa_ahmadawais{
  display: table;
  width: 100%;
  font: 100 1.2rem/2 Roboto;
  margin: 5rem auto;
}
    </style>
</head>
<body>

<div class="aa_htmlTable">
  <h2 class="aa_h2">HTML Table</h2>
  <table>
    <thead>
      <tr>
        <th>Month</th>
        <th>Savings</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>January</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>February</td>
        <td>$80</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>Sum</td>
        <td>$180</td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="aa_css">
  
  <h2 class="aa_h2">CSS Table</h2>

  <div class="table">
    <div class="thead">
      <div class="tr">
        <div class="th">.table > .thead > .tr > .th</div>
        <div class="th">.table > .thead > .tr > .th</div>
      </div>
    </div>
    <div class="tbody">
      <div class="tr">
        <div class="td">
          .table > .tbody > .tr > .td 
        </div>
        <div class="td">
          .table > .tbody > .tr > .td
        </div>
      </div>
      <div class="tr">
        <div class="td">
          .table > .tbody > .tr > .td
        </div>
        <div class="td">
          .table > .tbody > .tr > .td
        </div>
      </div>
    </div>
    <div class="tfoot">
      <div class="tr">
        <div class="td">
          .table > .tfoot > .tr > .td
        </div>
        <div class="td">
          .table > .tfoot > .tr > .td
        </div>
      </div>
    </div>
  </div>
  
  <div class="aa_ahmadawais">
  Developed by  <a href="http://AhmadAwais.com/about">Ahmad Awais</a> - UI/UX Designer & Front-end Developer 
</div>
</div>
</body>
</html>
