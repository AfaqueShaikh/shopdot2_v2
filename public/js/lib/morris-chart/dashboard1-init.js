// Dashboard 1 Morris-chart
$( function () {
	"use strict";


	// Extra chart
	Morris.Area( {
		element: 'extra-area-chart',
		data: [ {
				period: '2018',
				shirts: 0,
				shoes: 0,
				cap: 90,
				jeans: 0,
				watch: 0
        }, {
				period: '2019',
				shirts: 10,
				shoes: 60,
				cap: 40,
				jeans: 80,
				watch: 120
        }, {
				period: '2020',
				shirts: 120,
				shoes: 10,
				cap: 90,
				jeans: 30,
				watch: 50
        }


        ],
		lineColors: [ '#26DAD2', '#fc6180', '#62d1f3', '#ffb64d', '#4680ff' ],
		xkey: 'period',
		ykeys: [ 'shirts', 'shoes', 'cap', 'jeans', 'watch' ],
		labels: [ 'shirts', 'shoes', 'cap', 'jeans', 'watch' ],
		pointSize: 0,
		lineWidth: 0,
		resize: true,
		fillOpacity: 0.8,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'

	} );



} );
