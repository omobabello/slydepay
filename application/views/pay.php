<html>
  <head>
      <title>Payment Demo</title>
      <style type='text/css'>

        body{
          margin: 2em 1em;
          padding: 1em 2em;
          background: rgba(178,178,178,0.6);
          text-align: center;
        }

        .table{
          text-align: left;
          margin: 2em;
          height: 70%;
          width: 80%;
          background: #8ECCCC;
          color: #FFFFFF;
          font-size: 1.5em;
        }

        .right{
          text-align: right;
        }

        .table td{
          padding: 0 1em;
        }
      </style>
  </head>
  <body>
      <h3>WELCOME TO SLYDEPAY DEMO STORE</h3>
      <table class='table'>
          <thead>
            <td>S/N</td>
            <td>ITEM</td>
            <td>PRICE</td>
          </thead>
          <tbody>
            <tr>
                <td>1</td>
                <td>Apple wristwatch 800m </td>
                <td class='right'>800 &#8373;</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Asus laptop XXLAB500 </td>
                <td class='right'>2650 &#8373;</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Samsung 24' curve HD </td>
                <td class='right'>1800 &#8373;</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Binatone blender </td>
                <td class='right'>150 &#8373;</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Footmat 3x2 </td>
                <td class='right'>12 &#8373;</td>
            </tr>
            <tr>
                <td></td>
                <td>Total</td>
                <td class='right'><u><b>5412 &#8373;</b></u></td>
            </tr>
          </tbody>
      </table>
      <?php echo form_open('home/checkout');
            echo form_input(array('name' => 'name', 'placeholder' => 'Name', 'required'=> ''));
            echo form_input(array('name' => 'mobile', 'placeholder' => 'Mobile', 'required'=> ''));
            echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'required'=> ''));
            echo form_submit('','CHECKOUT');
            echo form_close(); ?>
  </body>
</html>
