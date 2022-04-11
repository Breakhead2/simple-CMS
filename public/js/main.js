/*
0 - обработка
1 - подтвержден
2 - доставлен
3 - закрыт
 */

function readStatus(code){
    let status = '';
    switch (code){
        case 0:
            status = 'reading';
            break;
        case 1:
            status = 'confirmed';
            break;
        case 2:
            status = 'delivered';
            break;
        case 3:
            status = 'closed';
            break;
    }
    return status;
}
