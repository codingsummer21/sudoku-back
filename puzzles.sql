
CREATE TABLE `puzzles` (
  `id` int(11) NOT NULL,
  `puzzle` varchar(81) NOT NULL,
  `solution` varchar(81) NOT NULL,
  `times_selected` int(11) NOT NULL DEFAULT '0',
  `times_solved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `puzzles`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `puzzles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

