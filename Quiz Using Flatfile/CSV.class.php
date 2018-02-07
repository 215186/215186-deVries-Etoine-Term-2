<?php
  // $delimiter is the separator.
  // self:: Refers to the class it is in, also tells you that it refers to something static in that class.
  // parse() convers input into an output in a different format.
  // this-> makes it so that you an access a function outside of the function it is called by instances.
  // Returns null if nothing is in the file.

  class CSV {
    // STATIC
    public static $data;

    /* PARSE FUNCTION */
    private static function parse($delimiter = ";") /* See line 2 */
    {
      self::$data = preg_replace('/\r\n/', "\n", self::$data); /* See line 3 */
      self::$data = explode("\n", self::$data);

      foreach (self::$data as &$line)
      {
        $line = explode($delimiter, $line);
      }
    }

    /* READ FUNCTION */
    public static function read($file, $delimiter = ";")
    {
      self::$data = file_get_contents($file);
      self::parse($delimiter); /* See line 4 */
      return self::$data;
    }

    /* WRITE FUNCTION */
    public static function write($file, $data, $delimiter = ";")
    {
      foreach ($data as &$row)
      {
        foreach ($row as &$col)
        {
          if (!is_numeric($col))
          {
            if (is_string($col))
            {
              if (!preg_match('/".*"/',$col))
              {
                $col= '"' . $col . '"';
              }
            }
            else
            {
              throw new Exception("Data type is incompatible.", 1);
            }
          }
        }
        $row = implode($delimiter, $row); /* glueing values in 1 line together */
      }
      $data = implode("\n", $data); /* glueing lines together */
      file_put_contents($file, $data);
    }

    // INSTANCE
    private $file_data;

    /* CONSTRUCT FUNCTION */
    public function __construct($file)
    {
      $this->file_data = CSV::read($file); /* See line 5 */
    }

    /* GET ROW FUNCTION */
    public function get_row($index)
    {
      if (isset($this->file_data[$index]))
        return $this->file_data[$index];

      return null; /* See line 5 */
    }

    /* GET CELL FUNCTION */
    public function get_cell($row_index, $col_index)
    {
      $row = $this->get_row($row_index);
      if ($row == null)
        return null;

      if (isset($row[$col_index])) {
        if (is_string($row[$col_index])) {
            $row[$col_index] = preg_replace('/"(.*)"/', '$1', $row[$col_index]);
        }
        return $row[$col_index];
      }
      return null;
    }

    /* SET CELL FUNCTION */
    public function set_cell($row_index, $col_index, $value)
    {
      if (isset($this->file_data[$row_index]))
      {
        $this->file_data[$row_index][$col_index] = $value;
        return $this->file_data[$row_index][$col_index];
      }
      return null;
    }

    /* ADD ROW FUNCTION */
    public function add_row($columns)
    {
      $this->file_data[] = $columns;
      $index = count($this->file_data);
      if ($index > 0) $index--;
      return $this->file_data[$index] == $columns;
    }

    /* PRINT FUNCTION */
    public function prnt()
    {
      $i = 0;
      foreach($this->file_data as $row)
      {
        echo "Row $i: ";
        foreach ($row as $col)
        {
            echo "$col, ";
        }
        echo "\n";
        $i++;
      }
    }

    /* REMOVE ROW FUNCTION */
    public function remove_row($row_index)
    {
      if ($row_index < 0 || count($this->file_data) < $row_index)
        return;

      array_splice($this->file_data, $row_index, 1);
    }

    /* UPDATE ROW FUNCTION */
    public function update_row($row_index, $row)
    {
      if ($row_index < 0 || count($this->file_data) < $row_index)
        return;

      $this->file_data[$row_index] = $row;
    }

    /* SAVE FUNCTION */
    public function save($file, $delimiter = ";")
    {
      CSV::write($file, $this->file_data, $delimiter);
    }
  }
?>
