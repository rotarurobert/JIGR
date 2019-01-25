<?php

class Mai{
  public static function getEndTodayData(){

        $EndTodayData['end_today1name'] = self::getEndTodayName1();
        $EndTodayData['end_today2name'] = self::getEndTodayName2();
        $EndTodayData['end_today3name'] = self::getEndTodayName3();
        $EndTodayData['end_today4name'] = self::getEndTodayName4();
        $EndTodayData['end_today5name'] = self::getEndTodayName5();

        $EndTodayData['end_today1price'] = self::getEndTodayPrice1();
        $EndTodayData['end_today2price'] = self::getEndTodayPrice2();
        $EndTodayData['end_today3price'] = self::getEndTodayPrice3();
        $EndTodayData['end_today4price'] = self::getEndTodayPrice4();
        $EndTodayData['end_today5price'] = self::getEndTodayPrice5();

    
        return $EndTodayData;

    }

    private static function getEndTodayName1(){
          require_once '../app/core/DB.php';

          $database = DB::getConnection();
          $query="SELECT name FROM products WHERE
                  extract(day FROM enddate) = extract(day FROM sysdate()) AND
                  extract(month FROM enddate) = extract(month FROM sysdate()) AND
                  extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 0,1";
          $stmt=$database->prepare($query);
          $stmt->execute();
          $stmt->bind_result($end_today1);
          $stmt->fetch();

              return $end_today1;

          $stmt->close();
      }

      private static function getEndTodayName2(){
            require_once '../app/core/DB.php';

            $database = DB::getConnection();
            $query="SELECT name FROM products WHERE
                    extract(day FROM enddate) = extract(day FROM sysdate()) AND
                    extract(month FROM enddate) = extract(month FROM sysdate()) AND
                    extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 1,1";
            $stmt=$database->prepare($query);
            $stmt->execute();
            $stmt->bind_result($end_today2);
            $stmt->fetch();

              return $end_today2;

            $stmt->close();
        }

        private static function getEndTodayName3(){
              require_once '../app/core/DB.php';

              $database = DB::getConnection();
              $query="SELECT name FROM products WHERE
                      extract(day FROM enddate) = extract(day FROM sysdate()) AND
                      extract(month FROM enddate) = extract(month FROM sysdate()) AND
                      extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 2,1";
              $stmt=$database->prepare($query);
              $stmt->execute();
              $stmt->bind_result($end_today3);
              $stmt->fetch();

              return $end_today3;

              $stmt->close();
          }

          private static function getEndTodayName4(){
                require_once '../app/core/DB.php';

                $database = DB::getConnection();
                $query="SELECT name FROM products WHERE
                        extract(day FROM enddate) = extract(day FROM sysdate()) AND
                        extract(month FROM enddate) = extract(month FROM sysdate()) AND
                        extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 3,1";
                $stmt=$database->prepare($query);
                $stmt->execute();
                $stmt->bind_result($end_today4);
                $stmt->fetch();

                return $end_today4;

                $stmt->close();
            }


            private static function getEndTodayName5(){
                  require_once '../app/core/DB.php';

                  $database = DB::getConnection();
                  $query="SELECT name FROM products WHERE
                          extract(day FROM enddate) = extract(day FROM sysdate()) AND
                          extract(month FROM enddate) = extract(month FROM sysdate()) AND
                          extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 4,1";
                  $stmt=$database->prepare($query);
                  $stmt->execute();
                  $stmt->bind_result($end_today5);
                  $stmt->fetch();

                  return $end_today5;

                  $stmt->close();

              }
              private static function getEndTodayPrice1(){
                    require_once '../app/core/DB.php';

                    $database = DB::getConnection();
                    $query="SELECT start_price FROM products WHERE
                            extract(day FROM enddate) = extract(day FROM sysdate()) AND
                            extract(month FROM enddate) = extract(month FROM sysdate()) AND
                            extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 0,1";
                    $stmt=$database->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($end_today1price);
                    $stmt->fetch();

                        return $end_today1price;

                    $stmt->close();
                }

                private static function getEndTodayPrice2(){
                      require_once '../app/core/DB.php';

                      $database = DB::getConnection();
                      $query="SELECT start_price FROM products WHERE
                              extract(day FROM enddate) = extract(day FROM sysdate()) AND
                              extract(month FROM enddate) = extract(month FROM sysdate()) AND
                              extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 1,1";
                      $stmt=$database->prepare($query);
                      $stmt->execute();
                      $stmt->bind_result($end_today2price);
                      $stmt->fetch();

                        return $end_today2price;

                      $stmt->close();
                  }

                  private static function getEndTodayPrice3(){
                        require_once '../app/core/DB.php';

                        $database = DB::getConnection();
                        $query="SELECT start_price FROM products WHERE
                                extract(day FROM enddate) = extract(day FROM sysdate()) AND
                                extract(month FROM enddate) = extract(month FROM sysdate()) AND
                                extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 2,1";
                        $stmt=$database->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($end_today3price);
                        $stmt->fetch();

                        return $end_today3price;

                        $stmt->close();
                    }

                    private static function getEndTodayPrice4(){
                          require_once '../app/core/DB.php';

                          $database = DB::getConnection();
                          $query="SELECT start_price FROM products WHERE
                                  extract(day FROM enddate) = extract(day FROM sysdate()) AND
                                  extract(month FROM enddate) = extract(month FROM sysdate()) AND
                                  extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 3,1";
                          $stmt=$database->prepare($query);
                          $stmt->execute();
                          $stmt->bind_result($end_today4price);
                          $stmt->fetch();

                          return $end_today4price;

                          $stmt->close();
                      }


                      private static function getEndTodayPrice5(){
                            require_once '../app/core/DB.php';

                            $database = DB::getConnection();
                            $query="SELECT start_price FROM products WHERE
                                    extract(day FROM enddate) = extract(day FROM sysdate()) AND
                                    extract(month FROM enddate) = extract(month FROM sysdate()) AND
                                    extract(year FROM enddate) = extract(year FROM sysdate()) ORDER BY start_price LIMIT 4,1";
                            $stmt=$database->prepare($query);
                            $stmt->execute();
                            $stmt->bind_result($end_today5price);
                            $stmt->fetch();

                            return $end_today5price;

                            $stmt->close();

                        }

          

}
