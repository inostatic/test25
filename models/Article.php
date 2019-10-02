<?php

class Article {
    public static function getArticleItemById($id) {
        //Обрезаем если число не целое
        $id = intval($id);
        //Подключаем PDO параметры уже внутри
        $db = Db::getConnection();
        //Делаем выборку
        $result = $db->query('SELECT*FROM article WHERE id='.$id);
        //Убираем повторяющиеся елементы с числовыми ключами
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $articleItem = $result->fetch();
        return $articleItem;
    }
    
    
    public static function getArticleList(){
        //Подключаем PDO параметры уже внутри
        $db = Db::getConnection();
        
        $articleList = [];
        $result = $db->query('SELECT id, title, date, short_content, author_name '
				. 'FROM article '
				. 'ORDER BY date DESC '
				. 'LIMIT 5');
        
			
        $i = 0;
        while($row = $result->fetch()) {
                $articleList[$i]['id'] = $row['id'];
                $articleList[$i]['title'] = $row['title'];
                $articleList[$i]['date'] = $row['date'];
                $articleList[$i]['short_content'] = $row['short_content'];
                $articleList[$i]['author_name'] = $row['author_name'];
                $i++;
        }
        return $articleList;
    }
}