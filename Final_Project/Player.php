</option><!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Player System</title>
  <?php
  $server = "127.0.0.1";        
  $dbuser = "root";       
  $dbpassword = "a26847315"; 
  $dbname = "Team_Project";  
  $connection = new mysqli($server, $dbuser, $dbpassword, $dbname);
  if($connection -> connect_error)
  {
    printf("connection failed");
  }
  ?>
</head>
<body>
  <button onclick="location.href='Homepage.php'">Back to Home page</button>
  <h1>Database Final Project</h1>
  <h2>NBA Players Stats Since 1950</h2>
  <font size="4">1. Input Player's Name</br></font>
  <font size="4">2. Select Team</br></font>
  <font size="4">3. Select Stats Type(required)</br></font>
  <font size="4">(must at least choose one from 1 and 2)</br></font>
<form method="post" action="Player.php">
  <label for="Name">Player's Name:</label>
  <input type="text" name="player">
  <label for="Team">Team:</label>
  <select name="team">
    <option value=""></option>
    <option value="ATL">ATL</option>
    <option value="BAL">BAL</option>
    <option value="BLB">BLB</option> 
    <option value="BOS">BOS</option>
    <option value="BRK">BRK</option>
    <option value="BUF">BUF</option>
    <option value="CAP">CAP</option>
    <option value="CHA">CHA</option>
    <option value="CHH">CHH</option>
    <option value="CHI">CHI</option>
    <option value="CHO">CHO</option>
    <option value="CHP">CHP</option>
    <option value="CHZ">CHZ</option>
    <option value="CIN">CIN</option>
    <option value="CLE">CLE</option>
    <option value="DAL">DAL</option>
    <option value="DEN">DEN</option>
    <option value="DET">DET</option>
    <option value="FTW">FTW</option>
    <option value="GSW">GSW</option>
    <option value="HOU">HOU</option>
    <option value="IND">IND</option>
    <option value="INO">INO</option>
    <option value="KCK">KCK</option>
    <option value="KCO">KCO</option>
    <option value="LAC">LAC</option>
    <option value="LAL">LAL</option>
    <option value="MEM">MEM</option>
    <option value="MIA">MIA</option>
    <option value="MIL">MIL</option>
    <option value="MIN">MIN</option>
    <option value="MLH">MLH</option>
    <option value="MNL">MNL</option>
    <option value="NJN">NJN</option>
    <option value="NOH">NOH</option>
    <option value="NOJ">NOJ</option>
    <option value="NOK">NOK</option>
    <option value="NOP">NOP</option>
    <option value="NYK">NYK</option>
    <option value="NYN">NYN</option>
    <option value="OKC">OKC</option>
    <option value="ORL">ORL</option>
    <option value="PHI">PHI</option>
    <option value="PHO">PHO</option>
    <option value="PHW">PHW</option>
    <option value="POR">POR</option>
    <option value="ROC">ROC</option>
    <option value="SAC">SAC</option>
    <option value="SAS">SAS</option>
    <option value="SDC">SDC</option>
    <option value="SDR">SDR</option>
    <option value="SEA">SEA</option>
    <option value="SFW">SFW</option>
    <option value="STL">STL</option>
    <option value="SYR">SYR</option>
    <option value="TOR">TOR</option>
    <option value="TOT">TOT</option>
    <option value="TRI">TRI</option>
    <option value="UTA">UTA</option>
    <option value="VAN">VAN</option>
    <option value="WAS">WAS</option>
    <option value="WSB">WSB</option>
    <option value="WSC">WSC</option>
  </select>
  <label for="Type">Stats Type</label>
  <select name="type">
    <option value=""> </option>
    <option value="basic">Basic Stats</option>
    <option value="offensive">Offensive Stats</option>
    <option value="defensive">Defensive Stats</option>
    <option value="advanced">Advenced Stats</option>
  </select>
<input type="submit" value="submit">
</form>

<?php
if(($_POST['player']!='')&&($_POST['type']!=''))
{
  $player = $_POST['player'];
  $team = $_POST['team'];
  $type = $_POST['type'];
  if($team != '')
  {
    if($type == 'basic')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Total_Rebound, Assist, Steal, Field_Goal_Percentage, Three_Point_Percentage
                    FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player') and Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's $player's Basic Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Total_Rebound<th>Assist<th>
        Steal<th>FG%<th>3PT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'offensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Assist, Field_Goal_Percentage, Two_Point_Percentage,
                    Three_Point_Percentage, Free_Throw_Percentage FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player') and Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's $player's Offensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Assist<th>FG%<th>
        2PT%<th>3PT%<th>FT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'defensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Total_Rebound, Steal, Block FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player') and Team = '$team' 
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's $player's Defensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Rebound<th>Steal<th>Block</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<8;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'advanced')
    {
      $sqlquery = "SELECT * FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player') and Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection -> query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's $player's Advanced Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Team<th>Game Played<th>Game Started<th>Average Time<th>FGM
        <th>FGA<th>FG%<th>3PTM<th>3PT<th>3PT<th>2PTM<th>2PTA<th>2PT%<th>EFG%<th>FTM<th>FTA<th>FT%<th>Offensive Rebound
        <th>Defensive Rebound<th>Turnove<th>Assist<th>Stea<th>Block<th>Turnover<th>Personal Foul<th>Point<th>year</tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<30;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
  }
  else
  {
    if($type == 'basic')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Total_Rebound, Assist, Steal, Field_Goal_Percentage, Three_Point_Percentage
                    FROM Player_Statistics_Per_Game 
                    WHERE Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$player's Basic Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Total_Rebound<th>Assist<th>
        Steal<th>FG%<th>3PT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'offensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Assist, Field_Goal_Percentage, Two_Point_Percentage,
                    Three_Point_Percentage, Free_Throw_Percentage FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player')
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$player's Offensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Assist<th>FG%<th>
        2PT%<th>3PT%<th>FT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'defensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Total_Rebound, Steal, Block FROM Player_Statistics_Per_Game 
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player')
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$player's Defensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Rebound<th>Steal<th>Block</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<8;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'advanced')
    {
      $sqlquery = "SELECT * FROM Player_Statistics_Per_Game             
                    WHERE (Player LIKE '$player %' or Player LIKE '% $player' or Player = '$player')
                    ORDER BY Player, Age ASC;";
      $result = $connection -> query($sqlquery);
      if($result -> num_rows >= 0)
      {
        echo "$player's Advanced Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Team<th>Game Played<th>Game Started<th>Average Time<th>FGM
        <th>FGA<th>FG%<th>3PTM<th>3PT<th>3PT<th>2PTM<th>2PTA<th>2PT%<th>EFG%<th>FTM<th>FTA<th>FT%<th>Offensive Rebound
        <th>Defensive Rebound<th>Turnove<th>Assist<th>Stea<th>Block<th>Turnover<th>Personal Foul<th>Point<th>year</tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<30;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
  }
}
else if(($_POST['player']=='')&&$_POST['type']!='')
{
  $team = $_POST['team'];
  $type = $_POST['type'];
  if($team != '')
  {
    if($type == 'basic')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Total_Rebound, Assist, Steal, Field_Goal_Percentage, Three_Point_Percentage
                    FROM Player_Statistics_Per_Game WHERE Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's Players' Basic Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Total_Rebound<th>Assist<th>
        Steal<th>FG%<th>3PT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'offensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Point, Assist, Field_Goal_Percentage, Two_Point_Percentage,
                    Three_Point_Percentage, Free_Throw_Percentage 
                    FROM Player_Statistics_Per_Game WHERE Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's Players' Offensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Point<th>Assist<th>FG%<th>
        2PT%<th>3PT%<th>FT%</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<11;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'defensive')
    {
      $sqlquery = "SELECT Player, Position, Age, Year, Team, Total_Rebound, Steal, Block 
                    FROM Player_Statistics_Per_Game WHERE Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection->query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's Players' Defensive Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Year<th>Team<th>Rebound<th>Steal<th>Block</th></tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<8;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
    else if($type == 'advanced')
    {
      $sqlquery = "SELECT * FROM Player_Statistics_Per_Game WHERE Team = '$team'
                    ORDER BY Player, Age ASC;";
      $result = $connection -> query($sqlquery);
      if($result -> num_rows > 0)
      {
        echo "$team's Players' Advanced Stats:</br>";
        echo '<table border = "1">';
        echo "<tr><th>Player<th>Position<th>Age<th>Team<th>Game Played<th>Game Started<th>Average Time<th>FGM
        <th>FGA<th>FG%<th>3PTM<th>3PT<th>3PT<th>2PTM<th>2PTA<th>2PT%<th>EFG%<th>FTM<th>FTA<th>FT%<th>Offensive Rebound
        <th>Defensive Rebound<th>Turnove<th>Assist<th>Stea<th>Block<th>Turnover<th>Personal Foul<th>Point<th>year</tr>";
        while($row = $result -> fetch_row())
        {
          echo "<tr>";
          for($i=0;$i<30;$i++)
          {
            echo "<td align='right'>$row[$i]</td>";
          }
          echo "</tr>";
        }
        $result -> free_result();
      }
    }
  }
}
$connection->close();
?>
</body>
</html>





