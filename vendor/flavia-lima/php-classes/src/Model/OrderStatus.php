<?php 

namespace Flavia\Model;

use \Flavia\DB\Sql;
use \Flavia\Model;
// use \Flavia\Model\Order; 

class OrderStatus extends Model {

	const EM_ABERTO = 1;
	const AGUARDANDO_PAGAMENTO = 2;
	const PAGO = 3;
	const ENTREGUE = 4;

}

?>