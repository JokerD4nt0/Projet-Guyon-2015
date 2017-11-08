INSERT INTO article(icon_article,icon_pj,date_debut,
date_fin,position,visible)
VALUES('test','test','0000-00-00','0000-00-00',2,1);
INSERT INTO langue_article(titre_article,soustitre_article,
contenu_article,libelle_pj,lien_pj,id_langue,id_article) 
VALUES('test titre','test soustitre','test contenu','test libelle',
'test lien',1,(SELECT id_article FROM article ORDER BY id_article DESC LIMIT 1));

