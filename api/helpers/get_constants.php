<?php 

function getConstants($name) {
    switch ($name) {
        case '40m':
            return [5.36, 5.2632];
            break;
        case '60m':
            return [7.38, 4.7619];
            break;
        case '80m':
            return [9.43, 4.5455];
            break;
        case '100m':
            return [11.41, 4,6512];
            break;
        case '150m':
            return [17.21, 4.4444];
            break;
        case '200m':
            return [23.09, 4.3478];
            break;
        case '300m':
            return [37.25, 4.0816];
            break;
        case '400m':
            return [51.59, 3.9216];
            break;
        case '60m Hurdles':
            return [8.57, 3.2258];
            break;
        case '80m Hurdles':
            return [11.07, 3.2258];
            break;
        case '100m Hurdles':
            return [13.62, 3.2258];
            break;
        case '200m Hurdles':
            return [26.69, 5.5088];
            break;
        case '600m':
            return [86.48, 4];
            break;
        case '800m':
            return [120.83, 4];
            break;
        case '1000m':
            return [156.99, 4];
            break;
        case '1500m':
            return [247.03, 3.9216];
            break;
        case '2000m':
            return [344.2, 3.8462];
            break;
        case '3000m':
            return [534.16, 3.7736];
            break;
        case 'High Jump':
            return [194.45, 2.9412];
            break;
        case 'Pole Vault':
            return [437.5, 1.9417];
            break;
        case 'Long Jump':
            return [676.5, 2.439];
            break;
        case 'Triple Jump':
            return [13.94, 2.5316];
            break;
        case 'Shot Put':
            return [18.28, 1.2195];
            break;
        case 'Discus':
            return [60.38, 1.1765];
            break;
        case 'Hammer':
            return [62.58, 1.0309];
            break;
        case 'Javelin':
            return [71.02, 1.1765];
            break;
        case 'Ball':
            return [95.94, 1.4493];
            break;
        default:
            return [1,1];
            break;
    }
}