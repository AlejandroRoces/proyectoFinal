        // Crear el gráfico
        const chart = LightweightCharts.createChart(document.getElementById('container'), {
            layout: {
                textColor: '#18f98f',
                background: {
                    type: 'solid',
                    color: 'white'
                },
            },
            rightPriceScale: {
                scaleMargins: {
                    top: 0.3,
                    bottom: 0.25,
                },
            },
            crosshair: {
                mode: LightweightCharts.CrosshairMode.Normal,
            },
            grid: {
                vertLines: {
                    visible: false
                },
                horzLines: {
                    visible: false
                },
            },
        });

        // Añadir serie de datos
        const areaSeries = chart.addAreaSeries({
            topColor: '#18f98f',
            bottomColor: 'rgba(41, 98, 255, 0.28)',
            lineColor: '#18f98f',
            lineWidth: 2,
        });

        // Datos proporcionados
        const data = [
            // Enero
            {
                time: '2025-01-01',
                value: 300
            },
            {
                time: '2025-01-02',
                value: 320
            },
            {
                time: '2025-01-03',
                value: 280
            },
            {
                time: '2025-01-04',
                value: 350
            },
            {
                time: '2025-01-05',
                value: 370
            },
            {
                time: '2025-01-06',
                value: 400
            },
            {
                time: '2025-01-07',
                value: 390
            },
            {
                time: '2025-01-08',
                value: 410
            },
            {
                time: '2025-01-09',
                value: 450
            },
            {
                time: '2025-01-10',
                value: 430
            },
            {
                time: '2025-01-11',
                value: 500
            },
            {
                time: '2025-01-12',
                value: 470
            },
            {
                time: '2025-01-13',
                value: 510
            },
            {
                time: '2025-01-14',
                value: 530
            },
            {
                time: '2025-01-15',
                value: 580
            },
            {
                time: '2025-01-16',
                value: 600
            },
            {
                time: '2025-01-17',
                value: 550
            },
            {
                time: '2025-01-18',
                value: 620
            },
            {
                time: '2025-01-19',
                value: 640
            },
            {
                time: '2025-01-20',
                value: 680
            },
            {
                time: '2025-01-21',
                value: 700
            },
            {
                time: '2025-01-22',
                value: 720
            },
            {
                time: '2025-01-23',
                value: 750
            },
            {
                time: '2025-01-24',
                value: 770
            },
            {
                time: '2025-01-25',
                value: 730
            },
            {
                time: '2025-01-26',
                value: 790
            },
            {
                time: '2025-01-27',
                value: 810
            },
            {
                time: '2025-01-28',
                value: 780
            },
            {
                time: '2025-01-29',
                value: 860
            },
            {
                time: '2025-01-30',
                value: 900
            },
            {
                time: '2025-01-31',
                value: 880
            },

            // Febrero
            {
                time: '2025-02-01',
                value: 920
            },
            {
                time: '2025-02-02',
                value: 890
            },
            {
                time: '2025-02-03',
                value: 970
            },
            {
                time: '2025-02-04',
                value: 950
            },
            {
                time: '2025-02-05',
                value: 1020
            },
            {
                time: '2025-02-06',
                value: 990
            },
            {
                time: '2025-02-07',
                value: 1080
            },
            {
                time: '2025-02-08',
                value: 1050
            },
            {
                time: '2025-02-09',
                value: 1100
            },
            {
                time: '2025-02-10',
                value: 1070
            },
            {
                time: '2025-02-11',
                value: 1150
            },
            {
                time: '2025-02-12',
                value: 1130
            },
            {
                time: '2025-02-13',
                value: 1180
            },
            {
                time: '2025-02-14',
                value: 1220
            },
            {
                time: '2025-02-15',
                value: 1190
            },
            {
                time: '2025-02-16',
                value: 1250
            },
            {
                time: '2025-02-17',
                value: 1300
            },
            {
                time: '2025-02-18',
                value: 1280
            },
            {
                time: '2025-02-19',
                value: 1350
            },
            {
                time: '2025-02-20',
                value: 1320
            },
            {
                time: '2025-02-21',
                value: 1400
            },
            {
                time: '2025-02-22',
                value: 1450
            },
            {
                time: '2025-02-23',
                value: 1420
            },
            {
                time: '2025-02-24',
                value: 1500
            },
            {
                time: '2025-02-25',
                value: 1470
            },
            {
                time: '2025-02-26',
                value: 1550
            },
            {
                time: '2025-02-27',
                value: 1600
            },
            {
                time: '2025-02-28',
                value: 1580
            },

            // Marzo a Junio con picos más pronunciados
            ...Array.from({
                length: 122
            }, (_, i) => {
                const date = new Date(2025, 2, i + 1);
                return {
                    time: date.toISOString().split('T')[0],
                    value: 2000 + Math.floor(Math.sin(i / 3) * 1000) + Math.floor(Math.random() * 500)
                };
            })
        ];
        areaSeries.setData(data);