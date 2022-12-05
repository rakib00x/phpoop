<?php
class Category
{
    public static function getCtgList()
    {
        $pdo = DB::getConnection();
        $ctg = $pdo->query("SELECT * FROM `category` WHERE status=1 ORDER BY sort_order ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $ctg;
    }
}
?>
