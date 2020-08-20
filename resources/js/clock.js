                      function showTime() {
                        var date = new Date();
                        var detik = date.getSeconds();
                        var jam = date.getHours();
                        var menit = date.getMinutes();
                        var tahun = date.getFullYear();
                        var bulan = date.getMonth();
                        var hari = date.getDate();

                        const monthNames = ["January", 
                                            "Februari",
                                            "Maret",
                                            "April",
                                            "Mei",
                                            "Juni",
                                            "Juli",
                                            "Agustus",
                                            "September",
                                            "Oktober",
                                            "November",
                                            "Desember"];
                            
                        document.getElementById('date').innerHTML = hari+" "+monthNames[bulan]+" "+tahun;
                        document.getElementById('time').innerHTML = jam+" : "+menit;
                      }

                      setInterval(showTime, 1000);
                   